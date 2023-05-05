@php
$category = DB::table('categories')->where('estado',1)->get();
@endphp

<nav style="color: white; background: black;" class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div style="color: white; background: black;" class="main_nav_content d-flex flex-row">
                        <!-- Categories Menu -->
                        <div style="color: white; background: black;" class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">Categorias</div>
                            </div>
                            <ul class="cat_menu">
                                @foreach ($category as $cats)
                                    <li class="hassubs">
                                        <a href="{{ url('allcategory/'.$cats->id)}}">{{ $cats->name }}<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            @php
                                                $subcategory = DB::table('subcategories')->where('category_id', $cats->id)->get();
                                            @endphp
                                            @foreach ($subcategory as $sub)
                                                <li class="hassubs">
                                                    <a href="{{ url('products/'.$sub->id)}}"> {{ $sub->subcategory_name }} <i class="fas fa-chevron-right"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li> 
                                @endforeach   
                            </ul>
                        </div>
                        <!-- Main Nav Menu -->
                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="/tienda">Inicio<i class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
                                    <a href="{{ route('pages.perfiltienda') }}">Mis ordenes</a>
                                </li>
                               {{--  <li class="hassubs">
                                    <a href="{{ route('payment.step') }}">Pago de orden</i></a>
                                </li> --}}
                                <li class="hassubs">
                                    <a href="{{ route('home') }}">Planes</a>                                   
                                </li>
                            </ul>
                        </div>
                        <!-- Menu Trigger -->
                        <div class="menu_trigger_container ml-auto" >
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Menu -->

    <div class="page_menu">
        <div class="container" >
            <div class="row" >
                <div class="col">
                    <div class="page_menu_content" style="color: white; background: black;">
                        <div class="page_menu_search"> 
                            <form method="POST" action="{{route('product.search')}}">
                                @csrf
                                <input type="search" required="required" class="page_menu_search_input" placeholder="Busca por productos...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item">
                                <a href="/tienda">Inicio</a>
                            </li>
                            <li class="page_menu_item">
                                <a href="{{ route('pages.perfiltienda') }}">Mis ordenes</a>
                            </li>
                            {{-- <li class="page_menu_item">
                                <a href="{{ route('payment.step') }}">Pago de orden</i></a>
                            </li> --}}
                            <li class="page_menu_item">
                                <a href="{{ route('home') }}">Planes</a>
                            </li>
                            @auth
                                <li class="page_menu_item">                               
                                    <a href="#" class="">
                                       {{--  <img style="width: 20px; margin-right: 20px; height: 20px; border-radius: 50%;" src="{{ asset('frontend/images/user.svg')}}" alt="">
                                        {{ Auth::user()->name }} --}}

                                        <div class="flex-shrink-0 mr-3">
                                            <img style="width: 2.5rem; height: 2.5rem; background-image: cover; border-radius: 50%" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </div>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    {{ Auth::user()->name }}
                                    {{-- <a href="{{ route('logout') }}">Cerrar sesión</a> --}}
                                </li>
                            @endauth
                           @guest
                                <li class="page_menu_item"><a href="{{ route('login') }}" class="">Inicio de sesión</a></li>
                                <li class="page_menu_item"><a href="{{ route('register') }}" class="">Registro</a></li>
                           @endguest
                        </ul>
                        <div class="menu_contact">
                            <div class="menu_contact_item"><div class="menu_contact_icon"></div>{{ $settings['phone'] }}</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"></div><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>


