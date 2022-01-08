<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CorreoAceptacionTienda;
use App\Mail\CorreoProcesoEntrega;
use App\Mail\CorreoProcesoFinalizado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->search;

      $order = DB::table('orders')
                    ->join('users','orders.user_id','users.id') 	
                    ->where('users.name', 'LIKE','%'.$search.'%')
                    ->select('orders.*','users.name')
                    ->where('orders.status', 0)
                    ->orderBy('orders.id', 'desc')
                    ->paginate(8);        
      return view('admin.orders.index', compact('order'));
    }

    public function viewOrder($id)
    {
        $order = DB::table('orders')
                ->join('users','orders.user_id','users.id') 	
                ->select('orders.*','users.name')
                ->where('orders.id',$id)
                ->first();
    
         $shipping = DB::table('shipping')->where('order_id',$id)->first();
    
         $details = DB::table('ordersdetails')
                     ->join('products','ordersdetails.product_id','products.id')
                     ->select('ordersdetails.*','products.image_one')
                     ->where('ordersdetails.order_id',$id)
                     ->get();
        return view('admin.orders.view_order',compact('order','shipping','details'));		
    }
    
    public function PaymentAccept($id)
    {
      
      try {
          DB::beginTransaction();
          //descuento de stock
          $product = DB::table('ordersdetails')->where('order_id', $id)->get();

          foreach ($product as $row) {
            DB::table('products')
              ->where('id', $row->product_id)
              ->update(['product_quantity' => DB::raw('product_quantity-'.$row->quantity)]);
          }
          
          //fin de descuento de stock
          $shipping = DB::table('shipping')->where('order_id', $id)->first();
          $data = DB::table('orders')->where('id',$id)->first();
          DB::table('orders')->where('id',$id)->update(['status'=>1]);

          DB::afterCommit(function () use ($data,$shipping,$product){
              Mail::to($shipping->ship_email)
              ->cc('smith93svam@gmail.com')
              ->send(new CorreoAceptacionTienda($data,$shipping,$product));
          });

          DB::commit();
          $variable1 = "El pago fue aceptado con exito";
          return Redirect()->route('admin.orders.accept')->with('exito', $variable1); 
        
      } catch (\Throwable $th) {
          DB::rollBack();
          $variable1 = "Ocurrio un error al aceptar el pago vuelve a intentarlo mas tarde"; 
          return redirect()->route('admin.orders.index')->with('error', $variable1);
      }

    } 
  
  
    public function PaymentCancel($id){
      
      DB::table('orders')->where('id',$id)->update(['status'=>4]);

      return redirect()->route('admin.orders.index');
    } 
    
    public function AcceptPayment(Request $request){

      $search = $request->search;
      $order = DB::table('orders')
      ->join('users','orders.user_id','users.id') 	
                    ->where('users.name', 'LIKE','%'.$search.'%')
                    ->select('orders.*','users.name')
                    ->where('orders.status', 1)
                    ->orderBy('orders.id', 'desc')
                    ->paginate(8);
    
      return view('admin.orders.index', compact('order'));
    }
  
    public function CancelOrder(Request $request)
    {
      $search = $request->search;
      $order = DB::table('orders')
      ->join('users','orders.user_id','users.id') 	
                    ->where('users.name', 'LIKE','%'.$search.'%')
                    ->select('orders.*','users.name')
                    ->where('orders.status', 4)
                    ->orderBy('orders.id', 'desc')
                    ->paginate(8);
      
      return view('admin.orders.index', compact('order'));
    }
  
    public function ProcessPayment(Request $request)
    {
      $search = $request->search;
      $order = DB::table('orders')
      ->join('users','orders.user_id','users.id') 	
                    ->where('users.name', 'LIKE','%'.$search.'%')
                    ->select('orders.*','users.name')
                    ->where('orders.status', 2)
                    ->orderBy('orders.id', 'desc')
                    ->paginate(8);

      return view('admin.orders.index', compact('order'));
    }

    public function SuccessPayment(Request $request)
    {
      $search = $request->search;
      $order = DB::table('orders')
      ->join('users','orders.user_id','users.id') 	
                    ->where('users.name', 'LIKE','%'.$search.'%')
                    ->select('orders.*','users.name')
                    ->where('orders.status', 3)
                    ->orderBy('orders.id', 'desc')
                    ->paginate(8);

      return view('admin.orders.index', compact('order'));
    }
    
    public function DeleveryProcess($id){

        try {
          DB::beginTransaction();
              DB::table('orders')->where('id',$id)->update(['status'=>2]);
              $orden = DB::table('orders') 
                            ->join('users','orders.user_id','users.id')
                            ->select('orders.*','users.name','users.email') 
                            ->where('orders.id',$id)
                            ->first();
                            
              DB::afterCommit(function () use ($orden){
                  Mail::to($orden->email)
                        ->cc('smith93svam@gmail.com')
                        ->send(new CorreoProcesoEntrega($orden));
              });

              DB::commit();
              $variable1 = "El cambio de la orden a proceso de entrega fue un exito";
              return Redirect()->route('admin.orders.process')->with('exito', $variable1);  
          
        } catch (\Throwable $th) {
          DB::rollBack();
              $variable1 = "El cambio de la orden a proceso de entrega tuvo un error intentalo mas tarde";
              return Redirect()->route('admin.orders.accept')->with('error', $variable1);
        }
    } 

    public function DeleveryDone($id)
    {

      try {
        DB::beginTransaction();
            DB::table('orders')->where('id',$id)->update(['status'=>3]);
            $orden = DB::table('orders') 
                          ->join('users','orders.user_id','users.id')
                          ->select('orders.*','users.name','users.email') 
                          ->where('orders.id',$id)
                          ->first();
                          
            DB::afterCommit(function () use ($orden){
                Mail::to($orden->email)
                      ->cc('smith93svam@gmail.com')
                      ->send(new CorreoProcesoFinalizado($orden));
            });

            DB::commit();
            $variable1 = "El cambio de la orden a proceso de entrega finalizado fue un exito";
            return Redirect()->route('admin.orders.success')->with('exito', $variable1);
        
      } catch (\Throwable $th) {
        DB::rollBack();
            $variable1 = "El cambio de la orden a proceso de entrega finalizada tuvo un error intentalo mas tarde";
            return Redirect()->route('admin.orders.process')->with('error', $variable1);
      }
       
      

    }
}
