@extends('layouts.appro')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">

<div class="single_product">
    <div class="container">
        <div style="margin-top: -90px" class="row">
            
            <!-- Images -->
            {{-- <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
                    <li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
                    <li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
                </ul>
            </div> --}}

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img style="width: 300px;" src="{{Storage::url($product->image_one)}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3" style="padding: 20px">
                <div>
                    <div class="product_category">{{ $product->category_name }} > {{ $product->subcategory_name }}</div>
                    <div class="product_name">{{ $product->product_name }}</div>
                    <div class="rating_r rating_r_4 product_rating"></div>
                    <div style="margin-top: -5px" class="product_text text-justify"><p>{!! $product->product_details !!}</p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
                            @csrf
                            <div style="margin-top: -30px" class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Color:</label>
                                        <select class="form-control text-center" id="exampleFormControlSelect1" name="color">
                                            @foreach ($product_color as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if ($product->product_size == NULL)
                                @else
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"> Talla:</label>
                                            <select class="form-control text-center" id="exampleFormControlSelect1" name="size">
                                                @foreach ($product_size as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"> Cantidad:</label>
                                        <input class="form-control text-center" pattern="[0-9]" type="number" name="qty" value="1">
                                    </div>
                                </div>
                            </div>
                            @if($product->discount_price == NULL)
                                <div style="margin-top: 10px" class="product_price"><span style="font-size: 20px; color:black">Precio:</span> ${{$product->selling_price }}</div>
                            @else
                                <div style="margin-top: 20px" class="product_price discount"><span style="font-size: 20px; color:black">Precio:</span> ${{$product->discount_price }}<span>${{$product->selling_price }}</span></div>
                            @endif
                            <div style="margin-top: 20px; width: 100%" >
                                <button type="submit" class="btn btn-block btn-primary">Añadir a carrito</button>{{-- 
                                <div class="product_fav"><i style="color: black" class="fas fa-heart"></i></div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection