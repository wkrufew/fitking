<?php

namespace App\Http\Controllers;

use App\Mail\CorreoPaypal;
use App\Models\Comprador;
use App\Models\Course;
use App\Mail\CorreoPlan;
use App\Mail\CorreoTransferencia;
use App\Mail\CorreoTransferenciaTienda;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use PayPal\Api\Plan;

class PaymentController extends Controller
{
    public function verification(Course $plan)
    {
        return redirect()->route('planes.show', $plan);
    }

    public function pay(Course $plan)
    {
        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),    // ClientID
                config('services.paypal.client_secret'),      // ClientSecret
            )
        );

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($plan->price->value);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.approved', $plan))
            ->setCancelUrl(route('payment.checkout', $plan));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // After Step 3
        try {
            $payment->create($apiContext);

            return redirect()->away($payment->getApprovalLink());
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function approved(Request $request, Course $plan)
    {
        try {
            //dd(auth()->user()->email);
            //return $request->all();
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),    // ClientID
                    config('services.paypal.client_secret'),      // ClientSecret
                )
            );
            $paymentId = $_GET['paymentId'];
            $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
            $execution = new \PayPal\Api\PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            $payment->execute($execution, $apiContext);
            Mail::to(auth()->user()->email)
                ->cc('smith93svam@gmail.com')
                ->send(new CorreoPlan($plan));

            $plan->students()->attach(auth()->user()->id);
        } catch (Exception $e) {
            $errorpaypal = "Estimado " . auth()->user()->name . " ocurrio un problema por favor intenta adquirir el plan mas tarde ";
            return redirect()->route('planes.show', $plan)->with(compact('errorpaypal'));
        }
        $exitopaypal = "Bienvenido al Team FitKing, " . auth()->user()->name . " has aquirido el plan que te llevara al siguiente nivel";
        return redirect()->route('planes.status', $plan)->with(compact('exitopaypal'));
    }

    /* PARA ABRI LA TRANSFERENCIA BANCARIA */
    public function cash(Course $plan)
    {
        return view('payment.cash', compact('plan'));
    }
    /* RESERVA DEL PLAN FUNCION QUE ENVIA RESERVA */
    public function pago(Course $plan)
    {
        $user = auth()->user();
        try {
            $exists  = Comprador::where('id_usuario', $user->id)->where('id_plan', $plan->id)->exists();

            if ($exists ) {
                $notificacion2 = "$user->name ya tienes una reserva de este plan, por favor elige otro de nuestro catálogo de planes.";
                return redirect()->route('planes.show', $plan)->with(compact('notificacion2'));
            }

            $reserva = new Comprador();
            $reserva->nombre_usuario = $user->name;
            $reserva->nombre_curso = $plan->title;
            $reserva->id_usuario = $user->id;
            $reserva->id_plan = $plan->id;
            $reserva->save();

            Mail::to($user->email)
                ->cc('smith93svam@gmail.com')
                ->send(new CorreoTransferencia($plan));

            $notificacion = "Felicidades $user->name los pasos para la reserva del plan $plan->title seran enviados a tu correo";
            return redirect()->route('planes.show', $plan)->with(compact('notificacion'));
            
        } catch (\Throwable $th) {
            $notificacionreserva = "A ocurrido un error al realizar el proceso de reserva, por favor vuelve a intentarlo más tarde.";
            return redirect()->route('planes.show', $plan)->with(compact('notificacionreserva'));
        }
    }

    /* PAGO DE PRODUCTOS DE LA TIENDA */
    public function Payment(Request $request)
    {
        $datos = array();
        $datos['ship_name'] = $request->ship_name;
        $datos['ship_phone'] = $request->ship_phone;
        $datos['ship_email'] = $request->ship_email;
        $datos['ship_address'] = $request->ship_address;
        $datos['ship_city'] = $request->ship_city;
        $datos['payment_id'] = $request->payment_type;

        if ($request->payment_type == 'paypal') {

            $compras = DB::table('settings')->select('shipping_charge')->first();
            $valordelcarro = Cart::subtotal() + $compras->shipping_charge;
            // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),
                    config('services.paypal.client_secret'),
                )
            );

            $payer = new \PayPal\Api\Payer();
            $payer->setPaymentMethod('paypal');

            $amount = new \PayPal\Api\Amount();
            $amount->setTotal($valordelcarro);
            $amount->setCurrency('USD');

            $transaction = new \PayPal\Api\Transaction();
            $transaction->setAmount($amount);

            $redirectUrls = new \PayPal\Api\RedirectUrls();
            $redirectUrls->setReturnUrl(route('payment.aprobado', $datos))
                ->setCancelUrl(route('tienda'));

            $payment = new \PayPal\Api\Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

            // After Step 3
            try {
                $payment->create($apiContext);

                return redirect()->away($payment->getApprovalLink());
            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getData();
            }

            $paymentId = $_GET['paymentId'];
            $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

            $execution = new \PayPal\Api\PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            $payment->execute($execution, $apiContext);
        }

        if ($request->payment_type == 'transferencia') {
            try {
                DB::beginTransaction();

                $compras = DB::table('settings')->select('shipping_charge', 'shopname', 'email', 'phone', 'adderss')->first();

                $data = array();
                $data['user_id'] = auth()->user()->id;
                $data['payment_id'] = $request->payment_type;
                $data['paying_amount'] = Cart::Subtotal();
                $data['blnc_transection'] =  $compras->shipping_charge;
                $data['shipping'] =  $compras->shipping_charge;
                $data['total'] = Cart::Subtotal() + $compras->shipping_charge;
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
                $shipping['ship_name'] = $request->ship_name;
                $shipping['ship_phone'] = $request->ship_phone;
                $shipping['ship_email'] = $request->ship_email;
                $shipping['ship_address'] = $request->ship_address;
                $shipping['ship_city'] = $request->ship_city;
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

                DB::afterCommit(function () use ($data, $shipping, $content) {
                    Mail::to(auth()->user()->email)
                        ->cc('smith93svam@gmail.com')
                        ->send(new CorreoTransferenciaTienda($data, $shipping, $content));
                });
                Cart::destroy();


                DB::commit();
                $tiendatransferexito = "La reserva fue exitosa, los pasos para hacer efectiva la compra fueron enviados a su correo";
                return redirect()->route('pages.perfiltienda')->with(compact('tiendatransferexito'));
            } catch (\Throwable $th) {

                DB::rollBack();

                $tiendaerror = "Ocurrio un error por favor vuelve a intentarlo mas tarde";
                return redirect()->route('pages.perfiltienda')->with(compact('tiendaerror'));
            }
        }
    }

    public function aprobado(Request $request)
    {
        try {
            DB::beginTransaction();

            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),    // ClientID
                    config('services.paypal.client_secret'),      // ClientSecret
                )
            );
            $paymentId = $_GET['paymentId'];
            $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

            $execution = new \PayPal\Api\PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            $payment->execute($execution, $apiContext);

            /*GUARDA LOS DATOS A LA TABLA */

            $compras = DB::table('settings')->select('shipping_charge', 'shopname', 'email', 'phone', 'adderss')->first();

            $data = array();
            $data['user_id'] = auth()->user()->id;
            $data['payment_id'] = $request->payment_id;
            $data['paying_amount'] = Cart::Subtotal();
            $data['blnc_transection'] = $compras->shipping_charge;
            $data['shipping'] = $compras->shipping_charge; //aqui va el cargo
            $data['total'] = Cart::Subtotal() + $compras->shipping_charge;
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
            $shipping['ship_name'] = $request->ship_name;
            $shipping['ship_phone'] = $request->ship_phone;
            $shipping['ship_email'] = $request->ship_email;
            $shipping['ship_address'] = $request->ship_address;
            $shipping['ship_city'] = $request->ship_city;
            DB::table('shipping')->insert($shipping);

            // Insert Order Details Table

            //dd($comprador);
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

            //correo de envio por compra mediante paypal
            DB::afterCommit(function () use ($data, $shipping, $content) {
                Mail::to(auth()->user()->email)
                    ->cc('smith93svam@gmail.com')
                    ->send(new CorreoPaypal($data, $shipping, $content));
            });

            Cart::destroy();

            DB::commit();

            $tiendapaypalexito = "La compra fue exitosa sus datos de compra fueron enviados a su correo";

            return redirect()->route('pages.perfiltienda')->with(compact('tiendapaypalexito'));
        } catch (\Throwable $th) {
            DB::rollBack();
            $tiendaerror = "Ocurrio un error por favor vuelve a intentarlo mas tarde";
            return redirect()->route('pages.perfiltienda')->with(compact('tiendaerror'));
        }
    }
}
