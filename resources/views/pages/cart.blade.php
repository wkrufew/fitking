@extends('layouts.appro')

@section('content')

@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">

<div style="margin-top: -100px;" class="cart_section">
    <div class="container">
        <div style="margin-bottom:5px;" class="cart_title">Carrito de compras</div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                @forelse ($cart as $c)
                <div class="card mb-3" style="max-width: 100%;">
                   
                    <div class="row no-gutters">
                      <div class="col-4 col-sm-4 col-lg-2 text-center my-auto" >
                        <img style="width: 100px;" class="card-img"  src="{{Storage::url($c->options->image)}}" alt="">
                      </div>
                      <div class="col-8 col-sm-8 col-lg-10">
                        <div class="card-body">
                            <h5 class="card-title">{{ $c->name }}  <a href="{{ url('remove/cart/'. $c->rowId) }}" style="float: right; width: 25px; height: 25px;" class="btn btn-sm btn-danger">X</a></h5>
                            <div class="row">
                                <div class="col-12 col-lg-3 borde mt-2 ">
                                    <p class="card-text"><b>Color:</b>&nbsp;
                                        @if($c->options->color == NULL)
                                        
                                        @else
                                         {{ $c->options->color }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-12 col-lg-3 borde mt-2">
                                    <p class="card-text"><b>Talla:</b>&nbsp;
                                        @if($c->options->size == NULL)
                                        
                                        @else
                                         {{ $c->options->size }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-12 col-lg-3 borde mt-2 ">
                                  
                                        <form method="post" action="{{ route('update.cartitem') }}">
                                            @csrf
                                            <p class="card-text"><b>Catidad:</b>
                                            <input type="hidden" name="productid" value="{{ $c->rowId }}">
                                            <input type="number" name="qty" value="{{ $c->qty }}" style="width: 35px;">
                                            <button style="width: 27px; height: 27px;" type="submit" class="btn btn-info btn-sm"><i style="text-align: center;" class="fas fa-check-square"></i> </button>
                                            </p>
                                        </form>
                                   
                                </div>
                                <div class="col-12 col-lg-3 borde mt-2">
                                
                                    <p class="card-text"><b>Precio:</b>&nbsp;${{$c->price}}</p>
                                
                                </div> 

                                <div class="col-12 col-lg-3 borde mt-2">
                                
                                    
                                
                                </div> 

                              </div>
                        </div>
                       
                      </div>
                      <div style=" color: white; width: 90px;" class="col-12 col-sm-8 col-lg-12 text-center">
                        
                          <div style="background: black; color: white; width: 40%; margin: auto;">
                            <b>Total:</b>&nbsp;$ {{ $c->price*$c->qty }}
                         
                          </div>
                       
                      </div>
                    </div>
                </div>
                @empty
                    <div class="cart_item_title">Al momento no tienes articulos agregados dirigete a la tienda para adquirir uno</div>
                @endforelse
                <hr>
                <div  class="row mb-1 text-right">
                    <div  class="col-12"><h4><b>Total:</b>&nbsp; ${{ Cart::subtotal() }}</h4></div>
                </div>
                <hr>
                <div class="row mt-52 text-right">
                    
                    @if ($cart->count())
                        <div class="col-12 col-lg-6 borde"><a href="{{ route('payment.step') }}"  class="btn btn-info btn-md btn-block m-2 ">Pagar</a></div>
                        <div class="col-12 col-lg-6 borde"> <a href="/tienda"  class="btn btn-secondary btn-md btn-block m-2">Seguir comprando</a></div>
                       
                    @else 
                        <div class="col-12 col-lg-12 borde"> <a href="/tienda"  class="btn btn-secondary btn-md btn-block m-2">Ir a la tienda</a></div>
                        
                    @endif
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

{{-- <script src="{{ asset('frontend/js/cart_custom.js')}}"></script> --}}
@endsection