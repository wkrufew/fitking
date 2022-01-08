@extends('layouts.appro')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">


<div class="home">                                                                  
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frontend/images/shop_background.jpg') }}"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">Productos por categoria</h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row" style="margin-top: -50px">
            <div class="col-lg-3 order-lg-1  order-last">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categorias</div>
                        <ul class="sidebar_categories">
                            @php
                                $cat = DB::table('categories')->where('estado', 1)->get();
                            @endphp

                          @foreach ($cat as $c)
                          <li><a href="{{ url('allcategory/'.$c->id)}}">{{ $c->name }}</a></li>
                          @endforeach

                        </ul>
                    </div>
                   
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Marcas</div>
                        <ul class="brands_list">
                            @php
                                $brand = DB::table('brands')->get();
                            @endphp

                            @foreach ($brand as $b)
                               
                            <li class="brand"><a href="#">{{ $b->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div style="margin-top: -25px" class="col-lg-9  order-lg-2  order-first">
                
                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{ $category_all->count()}}</span> Productos encontrados</div>
                        <div class="shop_sorting">
                            {{-- aqui iba la lista de favoritos --}}
                        </div>
                    </div>
                    <div class="product_grid row container">
                        <div class="product_grid_border"></div>
                        <!-- Product Item -->
                        @forelse ($category_all as $pro)
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 100px; height: 120px;" src="{{Storage::url($pro->image_one)}}" alt=""></div>
                                <div class="product_content">
                                    @if($pro->discount_price == NULL)
                                        <div class="product_price discount">${{ $pro->selling_price }}{{-- <span> </span> --}}</div>
                                    @else
                                        <div class="product_price discount">${{ $pro->discount_price }}<span>${{ $pro->selling_price }}</span></div>
                                    @endif
                                    <div class="product_name"><div><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}">{{ $pro->product_name }}</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        @if($pro->discount_price == NULL)
                                        <li class="product_mark product_new" style="background: #0e8ce4;">Nuevo</li>
                                        @else
                                        <li style="background: #df3b3b;" class="product_mark product_new">
                                        @php
                                            $amount = $pro->selling_price - $pro->discount_price;
                                            $discount = $amount/$pro->selling_price*100;
                                        @endphp
                                            {{ intval($discount) }}%
                                            </li> 
                                        @endif
                                    </ul>
                            </div>
                        @empty
                        <div class="product_price">No se encuentran productos de esta categoria por el momento</div>
                        @endforelse
                    </div>
                    <!-- Shop Page Navigation -->
                    <div class="shop_page_nav d-flex flex-row">
                        {{ $category_all->links('vendor/pagination/bootstrap-4')}}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection