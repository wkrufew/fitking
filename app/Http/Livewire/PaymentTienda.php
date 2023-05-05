<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Mail\CorreoPaypal;
use App\Mail\CorreoTransferenciaTienda;
use Illuminate\Support\Facades\Mail;

class PaymentTienda extends Component
{
    public $setting, $envio, $tipos="envio", $tipopago="",$aprobacion;
    public $name,$email,$phone,$ciudad,$direction,$cedula;

    protected $listeners = ['payTienda'];

    protected $rules = [
        'name' => 'required|min:10|regex:/^[\pL\s]+$/u',
        'email' => 'required|email|string',
        'phone' => 'required|min:10|numeric',
        'direction' => 'required|min:10|string',
        'ciudad' => 'required|min:5|string',
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->setting = Setting::first();

        if (Auth::check()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        }
    } 

    public function render()
    {
        if ($this->tipos == "envio") {
            $this->envio = $this->setting->shipping_charge;
        }else{
            $this->envio = 0;
        }

        $cart = Cart::content();
        return view('livewire.payment-tienda', compact('cart'));
    }

    public function payTienda()
    {
        if ($this->tipopago) {

            $this->dispatchBrowserEvent('mensajetransferencia', [
                'title' => 'La compra esta procesándose por favor espere un momento ...',
                'icon' => 'warning'
            ]);

            try {
                DB::beginTransaction();

                $this->orden();
    
                Cart::destroy();

                DB::commit();

                //correo de envio por compra mediante paypal
                if ($this->tipopago === 'paypal') {
                    $tiendapaypalexito = "La compra fue exitosa, los datos de compra fueron enviados con exito a su correo";
                } elseif ($this->tipopago === 'transferencia') {
                    $tiendapaypalexito = "La compra fue exitosa, los pasos para validar la orden adquirida fueron enviados con exito a su correo";
                }
            
                return redirect()->route('pages.perfiltienda')->with(compact('tiendapaypalexito'));
            } catch (\Throwable $th) {
                DB::rollBack();
                $tiendaerror = "Ocurrio un error por favor vuelve a intentarlo mas tarde";
                return redirect()->route('pages.perfiltienda')->with(compact('tiendaerror'));
            }  
        }
    }

    public function orden()
    {
        $data = array();
        $data['user_id'] = auth()->user()->id;
        $data['payment_id'] = $this->tipopago;
        $data['paying_amount'] = Cart::Subtotal();
        $data['blnc_transection'] =  $this->envio;
        $data['shipping'] =  $this->envio; //aqui va el cargo
        $data['total'] = Cart::Subtotal() +  $this->envio;
        $data['subtotal'] = Cart::Subtotal();
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $data['created_at'] = date('Y-m-d H:m:s');
        $order_id = DB::table('orders')->insertGetId($data);

        /// Insert Shipping Table 
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $this->name;
        $shipping['ship_phone'] = $this->phone;
        $shipping['ship_email'] = $this->email;
        $shipping['ship_address'] = $this->direction;
        $shipping['ship_city'] = $this->ciudad;
        DB::table('shipping')->insert($shipping);

        // Insert Order Details Table
        $content = Cart::content();
        $details = array();

        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->qty * $row->price;
            DB::table('ordersdetails')->insert($details);
        }

        if ($this->tipopago === 'paypal') {
            //correo de envio por compra mediante paypal
            DB::afterCommit(function () use ($data, $shipping, $content) {
                Mail::to(auth()->user()->email)
                    ->cc('smith93svam@gmail.com')
                    ->send(new CorreoPaypal($data, $shipping, $content));
            });
        } elseif ($this->tipopago === 'transferencia') {
            DB::afterCommit(function () use ($data, $shipping, $content) {
                Mail::to(auth()->user()->email)
                    ->cc('smith93svam@gmail.com')
                    ->send(new CorreoTransferenciaTienda($data, $shipping, $content));
            });
        }
    }
}