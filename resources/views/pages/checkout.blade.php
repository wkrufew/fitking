@extends('layouts.appro')

@section('content')
{{-- 
@include('layouts.menubar') --}}

@php
    $settings = DB::table('settings')->first();
    $charge = $settings->shipping_charge;
    $vat = $settings->vat;    
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">

<div style="margin-top: -120px;" class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div style="margin-bottom: -50px;" class="cart_title">Compra</div>
                    <div class="cart_items">
                        <ul class="cart_list">

                            @forelse ($cart as $c)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image text-center"><br><img style="width: 85px; height: 85px;" src="{{Storage::url($c->options->image)}}" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Producto</div>
                                            <div class="cart_item_text">{{ $c->name }}</div>
                                        </div>
                                        
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                @if($c->options->color == NULL)
                                                
                                                @else
                                                <div class="cart_item_text"> {{ $c->options->color }}</div>
                                                @endif
                                            </div>
                                        

                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Talla</div>
                                                @if($c->options->size == NULL)
                                                
                                                @else
                                                <div class="cart_item_text"> {{ $c->options->size }}</div>
                                                @endif
                                            </div>

                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Catidad</div><br>
                                            <form method="post" action="{{ route('update.cartitem') }}">
                                                @csrf
                                                <input type="hidden" name="productid" value="{{ $c->rowId }}">
                                                <input type="number" name="qty" value="{{ $c->qty }}" style="width: 50px;">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i> </button>
                                  
                                            </form>
                                        </div>
                                    
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Precio</div>
                                            <div class="cart_item_text">${{$c->price}}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">$ {{ $c->price*$c->qty }}</div>
                                        </div>

                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Opciones</div><br>
                                            <a href="{{ url('remove/cart/'. $c->rowId) }}" class="btn btn-sm btn-danger">X</a>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <div class="cart_item_title">Al momento no tienes articulos agregados dirigete a la tienda para adquirir uno</div>
               
                            @endforelse

                        </ul>
                    </div>
                    
                    <!-- Order Total -->
                    {{-- <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Total a pagar:</div>
                            <div class="order_total_amount">${{ Cart::subtotal() }}</div>
                        </div>
                    </div> --}}
                    <ul class="list-group col-lg-8" style="float: right;">
                        <li class="list-group-item">SubTotal : <span style="float: right;">${{ Cart::Subtotal() }} </span> </li>    
            
                        <li class="list-group-item">Cargo de envio : <span style="float: right;">${{ $charge  }} </span> </li>
                       
                  <li class="list-group-item">Total : <span style="float: right;">${{ Cart::Subtotal() + $charge}} </span> </li>
                       
                      </ul> 
                    <div class="order-total-content" style="padding: 15px;">

                    </div>

                    <div style="margin-top: 20px;" class="cart_buttons">
                        
                            <a href="/tienda"  class="button cart_button_checkout">Seguir comprando</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <button type="button" class="button cart_button_clear">Cancelar</button>
                        {{-- <button type="button" class="button cart_button_checkout">Comprar</button> --}}
                        <a href="{{ route('payment.step') }}"  class="button cart_button_checkout">Pagar compra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('frontend/js/cart_custom.js')}}"></script>
@endsection