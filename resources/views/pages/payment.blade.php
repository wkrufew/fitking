@extends('layouts.appro')

@section('content')
    @include('layouts.menubar')

    @livewire('payment-tienda')
    {{-- 
    @php
        $settings = DB::table('settings')->first();
        $charge = $settings->shipping_charge;
        $vat = $settings->vat;
    @endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

    <div style="margin-top: -50px" class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Productos del carrito</div>


                        <div class="cart_items">
                            <ul class="cart_list">

                                @forelse ($cart as $c)
                                    <div class="card mb-3 " style="max-width: 100%;">

                                        <div class="row no-gutters">
                                            <div class="col-4 col-sm-4 col-lg-2 text-center my-auto">
                                                <img style="width: 100px;" class="card-img"
                                                    src="{{ Storage::url($c->options->image) }}" alt="">
                                            </div>
                                            <div class="col-8 col-sm-8 col-lg-10">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $c->name }}</h5>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-3 borde mt-2 ">
                                                            <p class="card-text"><b>Color:</b>&nbsp;
                                                                @if ($c->options->color == null)
                                                                @else
                                                                    {{ $c->options->color }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2">
                                                            <p class="card-text"><b>Talla:</b>&nbsp;
                                                                @if ($c->options->size == null)
                                                                @else
                                                                    {{ $c->options->size }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2 ">
                                                            <p class="card-text"><b>Catidad:</b>{{ $c->qty }}</p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2">
                                                            <p class="card-text">
                                                                <b>Precio:</b>&nbsp;${{ $c->price }}
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style=" color: white; width: 90px;"
                                                class="col-12 col-sm-8 col-lg-12 text-center">
                                                <div style="background: black; color: white; width: 40%; margin: auto;">
                                                    <b>Total:</b>&nbsp;$ {{ $c->price * $c->qty }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="cart_item_title">Al momento no tienes articulos agregados dirigete a la
                                        tienda para adquirir uno
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                        <hr>
                        <ul class="list-group col-lg-8" style="float: right;">
                            <li class="list-group-item"><b>Costo de envio: <span style="float: right;">${{ $charge }}
                                    </span></b></B>
                            </li>
                            <li class="list-group-item"><b>IVA: <span style="float: right;">Incluye IVA
                                </b></span>
                            </li>
                            <li class="list-group-item"><b>SubTotal: <span style="float: right;">${{ Cart::Subtotal() }}
                                </b></span>
                            </li>
                            <li class="list-group-item"><b>Total a pagar:
                                    <span style="float: right;">${{ Cart::Subtotal() + $charge }} </b></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 ml-2" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Dirección de Envío</div>
                        <form action="{{ route('payment.process') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombres completos</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Ingresar nombres completos " name="ship_name" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefono / Celular</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Ingrese su telefono o celular" name="ship_phone" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Ingrese su correo electronico " name="ship_email" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ciudad</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Ingrese el nombre de su ciudad" name="ship_city" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Direccion de entrega</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Ingrese su dirección domiciliaria" name="ship_address" required="">
                            </div>
                            <div class="contact_form_title text-center"> Metodo de Pago </div>
                            <div class="form-group">
                                <ul class="logos_list text-center">
                                    <li><input type="radio" name="payment_type" value="paypal"><i
                                            style="color: #1675e0 " class="fab fa-cc-paypal fa-w-18 fa-3x ml-2"></i>
                                        <br><b>Paypal</b></li>
                                    <li><input type="radio" name="payment_type" value="transferencia"><i
                                            style="color: #339768 " class="fas fa-money-check-alt fa-w-18 fa-3x ml-2"></i>
                                        <br><b>Tranferencia Bancaria</b>
                                    </li>
                                </ul>
                            </div>
                            <div class="contact_form_button text-center">
                                <button type="submit" class="btn btn-info">Pagar ahora</button>
                            </div>
                        </form>
                        <p style="font-size: 10px; margin-top: 15px">
                            <b>Nota:</b>
                            Las compras que esten dentro de la ciudad
                            el envio sera gratuito los de fuera de la ciudad tendran sobrecargo de envio
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

    @push('js')
        <script
            src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD&locale=es_EC">
        </script>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ Cart::Subtotal() + $charge }}'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        Livewire.emit('payPlan')
                        /* console.log(details); */
                        //alert('exito'+ details.payer.name.given_name);
                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endpush --}}
@endsection 
