<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FitKing') }}</title>
    <!-- icono de la app -->
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('img/home/marca1.webp') }}" type="image/x-icon">
    <meta name="description"
        content="Una plataforma fitnes donde puedes encontrar el curso ideal para tu cuerpo para verte saludable y bien">
    <style>
        ::-webkit-scrollbar{
            width: 15px;
        }

        ::-webkit-scrollbar-track{
            border: 5px;
            box-shadow: inset 0 0 15px #616161;
        }

        ::-webkit-scrollbar-thumb{
            /* background: linear-gradient(#eecda3,#ef629f); */
            background: #1d1d1d;
            border-radius: 25px;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    {{-- <link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css"> --}}
    <script src="https://kit.fontawesome.com/a501d340ea.js"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }} ">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
    <!-- chart -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

</head>
<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt="">
                                </div>099999999999999999
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt="">
                                </div><a href="#">lksdlaksjdlaskjdlaskd</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                @guest

                                @else
                                    <div class="top_bar_menu">
                                        <ul class="standard_dropdown top_bar_dropdown">
                                            <li>
                                                @auth
                                                    <a href="{{ route('pages.perfiltienda') }}">Mis ordenes</a>
                                                @endauth
                                            </li>
                                        </ul>
                                    </div>
                                @endguest
                                {{-- <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                </ul>
                            </div> --}}
                                <div class="top_bar_user">
                                    @guest
                                        <div class="top_bar_contact_item">
                                            <a href="{{ route('login') }}" class="">Inicio de Sesi??n</a>
                                            <a href="{{ route('register') }}" class="">Registro</a>
                                        </div>
                                    @else
                                        <ul class="standard_dropdown top_bar_dropdown">
                                            <li>
                                                <div class="user_icon">
                                                    @if (Auth::user()->profile_photo_url)
                                                        <img style="width: 20px; margin-right: 20px; height: 20px; border-radius: 50%;"
                                                            src="{{ Auth::user()->profile_photo_url }}" alt="">
                                                    @else
                                                        <img style="width: 20px; margin-right: 20px; height: 20px; border-radius: 50%;"
                                                            src="{{ asset('frontend/images/user.svg') }}" alt="">
                                                    @endif
                                                </div> {{ Auth::user()->name }}<i class="fas fa-chevron-down"></i>
                                                <ul>
                                                    <li><a href="{{ route('home') }}">Planes</a></li>
                                                    <li><a href="/tienda">Tienda</a></li>
                                                    <li><a href="{{ route('pages.perfiltienda') }}">Mis ordenes</a></li>
                                                    <li><a href="{{ route('payment.step') }}">Pagar orden</a></li>
                                                    <li><a href="{{ route('logout') }}">Cerrar sesion</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a style="color: black" href="/tienda">fitKING</a></div>
                            </div>
                        </div>
                        @php
                            $category = DB::table('categories')
                                ->where('estado', 1)
                                ->get();
                        @endphp
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        {{-- <form  method="post" action="{{ route('product.search') }}" class="header_search_form clearfix"> --}}
                                        <form method="POST" action="{{route('product.search')}}" class="header_search_form clearfix">
                                            @csrf
                                            <input type="search" required="required" class="header_search_input" placeholder="Busca por productos.." name="search">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">
                                                        Todas las categorias
                                                    </span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        @foreach ($category as $row)
                                                            <li><a class="clc" href="#">{{ $row->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300" value="Submit">
                                                <img src="{{ asset('frontend/images/search.png') }}" alt="search">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                {{-- <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                   </div>
                                @endguest --}}

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <a href="{{ route('show.cart') }}">
                                                <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                                <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                            </a>
                                        </div>
                                        <div class="cart_content">
                                            <a href="{{ route('show.cart') }}">
                                                <div class="cart_price">Carrito</div>
                                                <div class="cart_price">${{ Cart::subtotal() }}</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Navigation -->
            <!-- Characteristics -->
            @yield('content')
            <!-- Footer -->
                {{-- @php
                $setting = DB::table('sitesetting')->first();
                @endphp --}}
            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column footer_contact">
                                <div class="logo_container">
                                    <div class="logo"><a href="#">fitKING</a></div>
                                </div>
                                <div class="footer_title">LLamanos al:</div>
                                <div class="footer_phone">+593 998969589</div>
                                <div class="footer_contact_text">
                                    <p>Ciudadela Bella Vista</p>
                                    <p>Cumanda - Chimborazo- Ecuador</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Copyright -->

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div
                                class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                                <div class="copyright_content">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> Todos los derechos reservados por <b>fitKING</b>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </div>
                                <div class="logos ml-sm-auto">
                                    <ul class="logos_list">

                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_3.png') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!--Order Traking Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form method="post" action="{{ route('order.tracking') }}"> --}}
                    <form method="post" action="#">
                        @csrf
                        <div class="modal-body">
                            <label> Status Code</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Your Order Status Code">
                        </div>

                        <button class="btn btn-danger" type="submit">Track Now </button>

                    </form>


                </div>

            </div>
        </div>
    </div>
    
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        @if (Session::has('messege'))
        
            Swal.fire({
            position: 'top-end',
            width: 400,
            /* background: '#333333',*/
            toast: true,
            timerProgressBar: true,
            icon: 'success',
            title: 'A??adido al carrito de compras',
            showConfirmButton: false,
            timer: 3000
            })
        
        @endif

        @if (Session::has('messege2'))
        
            Swal.fire({
            position: 'top-end',
            width: 400,
            /* background: '#333333',*/
            toast: true,
            timerProgressBar: true,
            icon: 'success',
            title: 'Elemento removido con exito!',
            showConfirmButton: false,
            timer: 3000
            })
        
        @endif

        @if (Session::has('messege3'))
        
            Swal.fire({
            position: 'top-end',
            width: 400,
            /* background: '#333333',*/
            toast: true,
            timerProgressBar: true,
            icon: 'success',
            title: 'Cantidad actualizada con exito!',
            showConfirmButton: false,
            timer: 3000
            })
        
        @endif

        @if (Session::has('messege4'))
        
            Swal.fire({
            position: 'top-end',
            width: 400,
            /* background: '#333333',*/
            toast: true,
            timerProgressBar: true,
            icon: 'success',
            title: 'Luego de iniciar sesion podras comprar!',
            showConfirmButton: false,
            timer: 3000
            })
        
        @endif
    </script>
    <script>
        $(document).on("click", "#return", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Return?",
                    text: "Once Teturn, this will return your money!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Cancel!");
                    }
                });
        });
    </script>
</body>
</html>
