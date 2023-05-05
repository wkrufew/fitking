@extends('layouts.appro')
@section('content')
    @include('layouts.menubar')
    @include('layouts.slider')
    @php
    $featured = DB::table('products')
        ->where('status', 1)
        ->orderBy('id', 'desc')
        ->limit(12)
        ->get();
    $trend = DB::table('products')
        ->where('status', 1)
        ->where('trend', 1)
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();
    $best = DB::table('products')
        ->where('status', 1)
        ->where('best_rated', 1)
        ->orderBy('id', 'desc')
        ->limit(8)
        ->get();
    $hot = DB::table('products')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->select('products.*', 'brands.brand_name')
        ->where('products.status', 1)
        ->where('hot_deal', 1)
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();
    @endphp
    <!-- Deals of the week -->
    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    <!-- Deals -->
                    <div class="deals">
                        <div class="deals_title">Ofertas de la semana</div>
                        <div class="deals_slider_container">
                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                                @foreach ($hot as $ht)
                                    <!-- Deals Item -->
                                    <div class="owl-item deals_item">
                                        <div class="deals_image"><img src="{{ Storage::url($ht->image_one) }}" alt="">
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category"><a href="#">{{ $ht->brand_name }}</a>
                                                </div>
                                                @if ($ht->discount_price == null)
                                                @else
                                                    <div class="deals_item_price_a ml-auto">${{ $ht->selling_price }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name">
                                                <a href="{{ url('product/details/' . $ht->id . '/' . $ht->product_name ) }}">{{ $ht->product_name }}</a>
                                                </div>
                                                @if ($ht->discount_price == null)
                                                    <div class="deals_item_price ml-auto">${{ $ht->selling_price }}</div>
                                                @else
                                                @endif
                                                @if ($ht->discount_price != null)
                                                    <div class="deals_item_price ml-auto">${{ $ht->discount_price }}</div>
                                                @else
                                                @endif
                                            </div>
                                            <div class="available">
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Disponible:
                                                        <span>{{ $ht->product_quantity }}</span></div>
                                                    <div class="sold_title ml-auto">Vendidos: <span>28</span></div>
                                                </div>
                                                <div class="available_bar"><span style="width:17%"></span></div>
                                            </div>
                                            <div
                                                class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                <div class="deals_timer_title_container">
                                                    <div class="deals_timer_title">Date prisa</div>
                                                    <div class="deals_timer_subtitle">Fin de oferta en:</div>
                                                </div>
                                                <div class="deals_timer_content ml-auto">
                                                    <div class="deals_timer_box clearfix" data-target-time="">
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                            <span>Horas</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                            <span>Minutos</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                            <span>Segundo</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                            </div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Destacados</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>
                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @foreach ($featured as $row)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ Storage::url($row->image_one) }}" alt=""
                                                        style="height: 120px; width: 100px;"></div>
                                                <div class="product_content">
                                                    @if ($row->discount_price == null)
                                                        <div class="product_price discount">
                                                            ${{ $row->selling_price }}<span> </div>
                                                    @else
                                                        <div class="product_price discount">
                                                            ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="product_name">
                                                        <div><a
                                                                href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <button id="{{ $row->id }}"
                                                            class="product_cart_button addcart" data-toggle="modal"
                                                            data-target="#cartmodal" onclick="productview(this.id)">Añadir
                                                            al carrito</button>
                                                    </div>
                                                </div>
                                                <ul class="product_marks">
                                                    @if ($row->discount_price == null)
                                                        <li class="product_mark product_discount" style="background: blue;">
                                                            New</li>
                                                    @else
                                                        <li class="product_mark product_discount">
                                                            @php
                                                                $amount = $row->selling_price - $row->discount_price;
                                                                $discount = ($amount / $row->selling_price) * 100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Visualiza la segunda categoria -->
    @php
    $cats = DB::table('categories')
        ->where('estado', 1)
        ->skip(1)
        ->first();
    $catid = $cats->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'DESC')
        ->get();
    @endphp
    <div style="margin-top: -50px" class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $cats->name }}</div>
                            <ul class="clearfix">
                                <li class="active"> </li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">
                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                        @foreach ($product as $row)
                                            <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ Storage::url($row->image_one) }}" alt=""
                                                            style="height: 120px; width: 100px;"></div>
                                                    <div class="product_content">
                                                        @if ($row->discount_price == null)
                                                            <div class="product_price discount">
                                                                ${{ $row->selling_price }}<span> </div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            <div>
                                                                {{-- <a href="product.html"> --}}
                                                                <a href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">
                                                                    {{ $row->product_name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            {{-- <button class="product_cart_button">Añadir al carrito</button> --}}
                                                            <button id="{{ $row->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Añadir al carrito</button>
                                                        </div>
                                                    </div>
                                                    <ul class="product_marks">
                                                        @if ($row->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background: #0e8ce4;">Nuevo</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $row->selling_price - $row->discount_price;
                                                                    $discount = ($amount / $row->selling_price) * 100;
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="featured_slider_dots_cover"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Visualiza la categoria dos -->
    @php
    $cats = DB::table('categories')
        ->skip(3)
        ->first();
    $catid = $cats->id;
    $product = DB::table('products')
        ->where('category_id', $catid)
        ->where('status', 1)
        ->limit(10)
        ->orderBy('id', 'DESC')
        ->get();
    @endphp
    <div style="margin-top: -170px" class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $cats->name }}</div>
                            <ul class="clearfix">
                                <li class="active"> </li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">
                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                        @foreach ($product as $row)
                                            <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ Storage::url($row->image_one) }}" alt=""
                                                            style="height: 120px; width: 100px;"></div>
                                                    <div class="product_content">
                                                        @if ($row->discount_price == null)
                                                            <div class="product_price discount">
                                                                ${{ $row->selling_price }}<span> </div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                            </div>
                                                        @endif
                                                        <div class="product_name">
                                                            <div>
                                                                <a href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">
                                                                    {{ $row->product_name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            {{-- <button class="product_cart_button">Añadir al carrito</button> --}}
                                                            <button id="{{ $row->id }}"
                                                                class="product_cart_button addcart" data-toggle="modal"
                                                                data-target="#cartmodal"
                                                                onclick="productview(this.id)">Añadir al carrito</button>
                                                        </div>
                                                    </div>
                                                    <ul class="product_marks">
                                                        @if ($row->discount_price == null)
                                                            <li class="product_mark product_discount"
                                                                style="background: #0e8ce4;">Nuevo</li>
                                                        @else
                                                            <li class="product_mark product_discount">
                                                                @php
                                                                    $amount = $row->selling_price - $row->discount_price;
                                                                    $discount = ($amount / $row->selling_price) * 100;  
                                                                @endphp
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="featured_slider_dots_cover"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner 
        style="background-image:url(images/banner_2_background.jpg)"-->
    <!-- CONSULTA DE EL SLIDER MEDIO-->
    {{-- @php
    $slidermedio = DB::table('products')
        ->where('status', 1)
        ->where('mid_slider', 1)
        ->orderBy('id', 'desc')
        ->limit(6)
        ->get();
    @endphp --}}
    {{-- <div style="margin-top: -100px" class="banner_2">
        asxasxasxasx
        <div class="banner_2_background"
            style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->
            sagasdfg
            <div class="owl-carousel owl-theme banner_2_slider">
                <!-- Banner 2 Slider Item -->
                @foreach ($slidermedio as $medio)
                    <div class="owl-item">
                        <div class="banner_2_item">
                            <div class="container fill_height">
                                <div class="row fill_height">
                                    <div class="col-lg-4 col-md-6 fill_height">
                                        <div class="banner_2_content">
                                            <div class="banner_2_category">
                                                <h4>{{ $medio->category_name }}</h4>
                                            </div>
                                            <div class="banner_2_title">
                                                <a href="{{ url('product/details/' . $medio->id . '/' . $medio->product_name) }}">
                                                    {{ $medio->product_name }}
                                                </a>
                                            </div>
                                            <div class="banner_2_text">
                                                <h4>{{ $medio->brand_name }}</h4> <br>
                                                <h3><b>${{ $medio->selling_price }}</b></h3>
                                            </div>
                                            <div class="button banner_2_button">
                                                <a href="#" id="{{ $medio->id }}" class="addcart"
                                                    data-toggle="modal" data-target="#cartmodal"
                                                    onclick="productview(this.id)">Explorar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 fill_height">
                                        <div class="banner_2_image_container">
                                            <div class="banner_2_image"><img style="width: 400px; border-radius:10px;"
                                                    src="{{ Storage::url($medio->image_one) }}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- Trends -->
    <div class="trends">
        <div class="trends_background" style=""></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">
                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Productos Nuevos</h2>
                        <div class="trends_text">
                            <p>Los productos recien agregados al catalogo</p>
                        </div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>
                @php
                    $nuevos = DB::table('products')
                        ->where('status', 1)
                        ->where('hot_new', 1)
                        ->orderBy('id', 'desc')
                        ->limit(10)
                        ->get();
                @endphp
                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">
                        <!-- Trends Slider -->
                        <div class="owl-carousel owl-theme trends_slider">
                            <!-- Trends Slider Item -->
                            @foreach ($nuevos as $nuevo)
                                <div class="owl-item">
                                    <div class="trends_item is_new">
                                        <div
                                            class="trends_image d-flex flex-column align-items-center justify-content-center">
                                            <img style="height: 160px; width: 140px;"
                                                src="{{ Storage::url($nuevo->image_one) }}" alt=""></div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a>
                                                {{ $nuevo->brand_name }}</a>
                                            </div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name">
                                                    <a href="{{ url('product/details/' . $nuevo->id . '/' . $nuevo->product_name) }}">
                                                        {{ $nuevo->product_name }}
                                                    </a>
                                                </div>
                                                @if ($nuevo->discount_price == null)
                                                    <div class="product_price discount">${{ $nuevo->selling_price }}
                                                    </div>
                                                @else
                                                    <div class="product_price discount">
                                                        ${{ $nuevo->discount_price }}<span>${{ $nuevo->selling_price }}</span>
                                                    </div>
                                                @endif
                                                <a href="#" id="{{ $nuevo->id }}" class="btn btn-danger btn-sm mt-2"
                                                    data-toggle="modal" data-target="#cartmodal"
                                                    onclick="productview(this.id)">Añadir al carrito
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">
                                            <li style="background: #0e8ce4;" class="trends_mark trends_new">Nuevo</li>
                                        </ul>
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLavel">Vista rapida del producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="" id="pimage" style="height: 230px; width: 100%; margin: auto">
                                <div class="card-body">
                                    <h5 class="card-title text-center" id="pname"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Codido:</b> &nbsp;<span id="pcode"></span> </li>
                                <li class="list-group-item"><b>Categoria:</b>  &nbsp;<span id="pcat"></span></li>
                                <li class="list-group-item"><b>Subcategoria:</b>  &nbsp;<span id="psub"></span></li>
                                <li class="list-group-item"><b>Marca:</b> &nbsp;<span id="pbrand"></span> </li>
                                <li class="list-group-item"><b>Stock: </b> <span id="constock" class="badge badge-success">Con Stock <b id="pcantidad"></b></span>
                                    <span id="sinstock" class="badge badge-danger">Sin Stock <b id="pcantidad"></b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <form method="post" action="{{ route('insert.into.cart') }}">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id">
                                <div class="form-group">
                                    <label for="exampleInputcolor"><b>Color</b> </label>
                                    <select style="width: 200.5125px;" name="color" class="form-control" id="color" style="width: 200px !important" >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcolor"><b>Talla</b> </label>
                                    <select name="size" class="form-control" id="size">
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputcolor"><b>Catidad</b> </label>
                                    <input type="number" class="form-control" name="qty" value="1">
                                </div>
                                {{-- <li class="list-group-item"><span id="pcantidad"></span> </li> --}}
                                <div id="boton">
                                    <button type="submit" class="btn btn-primary btn-block">Añadir al carrito </button>
                                </div>
                                <div id="texto" class="btn btn-danger btn-block" onClick="reply_click()">Sin Stock</div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js">
    </script>
    <script type="text/javascript">    
        function productview(id) {
            $.ajax({
                url: "{{ url('/cart/product/view/') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#pcode').text(data.product.product_code);
                    $('#pcat').text(data.product.category_name);
                    $('#psub').text(data.product.subcategory_name);
                    $('#pbrand').text(data.product.brand_name);
                    $('#pname').text(data.product.product_name);
                    $('#pcantidad').text(data.product.product_quantity);
                    if (data.product.product_quantity > 0) {
                        $('#texto').hide();
                        $('#constock').show();
                        $('#sinstock').hide();
                        $('#boton').show();
                    }
                    if (data.product.product_quantity <= 0){
                        $('#texto').show();
                        $('#sinstock').show();
                        $('#constock').hide();
                        $('#boton').hide();
                    }

                    $('#pimage').attr('src', "/storage/" + data.product.image_one);
                    $('#product_id').val(data.product.id);

                    var d = $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });

                    var d = $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });
                }
            })
        }
        function reply_click()
        {
            alert('Este producto no dispone de stock por el momento');
        }   
    </script>
@endsection
