<nav class="navbar">
  <div class="top-navbar">
      <div>
          <span><a href="#"><i class="fa-solid fa-envelope"></i> info@pegoccidente.com</a></span>
          <span><a href="#"><i class="fa-brands fa-whatsapp"></i> +58 416 - 4567084</a></span>
      </div>
      <div>
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin"></i></a>
      </div>
  </div>
  <div class="navbar-content">
      <a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="" class="nav-img"></a>
      <ul class="ul">
          <li><a href="{{ route('about') }}" class="underline">Nosotros</a></li>
          <li><a href="{{ route('project') }}" class="underline">Proyectos</a></li>
          <li><a href="{{ route('products_view') }}" class="underline">Productos</a>
              <div class="submenu">
                @foreach ($categories as $category)
                <div class="submenu-categorias">
                    <a href="{{ route('products_by_category', $category->id) }}" class="title-category">Linea de {{ $category->name }} <i class="fa-solid fa-angles-right"></i></a>
                    <div class="submenu-subcategoria">
                        @foreach ($category->subcategories as $subcategory)
                        <div>
                            <header><a href="{{ route('products_by_subcategory', $subcategory->id) }}" class="title-subcategory">{{ $subcategory->name }} <i class="fa-solid fa-angle-right"></i></a></header>
                            <ul>
                                @foreach ($subcategory->products as $product)
                                <li><a href="{{ route('product_detail', $product->id) }}" style="text-transform: uppercase"><ion-icon name="radio-button-on-outline" class="icon-diana"></ion-icon>{{ $product->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
              </div>
          </li>
          <li><a href="{{ route('contact') }}" class="underline">Contacto</a></li>
      </ul>
      <div class="icon-nav">
          <div>
              <form action="{{ route('search') }}" method="GET" class="form-search">
                  <div class="div-search-input">
                      <input type="text" name="search" placeholder="Buscar Producto" class="search-input">
                      <button class="button-search">
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                  </div>
              </form>
          </div>
          {{-- ICON USER --}}
          <div class="icon-user">
            <button id="action_menu_user"><i class="fa-solid fa-user"></i></button>
            {{-- DROPDOWN MENU USER --}}
            <div class="menu_user inactive">
                @auth
                <div class="menu_user--header">
                    <p>Bienvenido, {{ Auth::user()->name }}</p>
                </div>
                <ul>
                    <li>
                        <a href="#">Perfil</a>
                    </li>
                    <li>
                        <a href="{{ route('order.index') }}">Pedidos</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Cerrar sesion</button>
                        </form>
                    </li>
                </ul>
                @else
                <ul>
                    <li>
                        <a href="{{ route('login') }}">Iniciar sesion</a>
                    </li>
                </ul>      
                @endauth
            </div>
          </div>

          <div class="icon-bars">
            <ion-icon name="reorder-four-outline" id="icon-hamburguer"></ion-icon>
          </div>
          {{-- ICON TRUCK --}}
          <div class="icon_truck @if(!Auth::user()) inactive @endif">
            <button id="button_truck"><i class="fa-solid fa-truck" ></i></button>
            @if(session()->has('cart'))
                @php
                    $count = 0;
                    $cart = session('cart');
                @endphp
                @foreach ($cart as $item)
                    <span>{{ $count += $item['quantity']}}</span>
                @endforeach
            @endif
            <aside class="container_cart--menu inactive" id="container_truck_menu">
                <div class="title-container">
                  <img src="{{ asset('icons/flechita.svg') }}" alt="arrow">
                  <p class="title">My order</p>
                </div>
                <div class="my-order-content">
                    <div class="content-detail">
                        @php
                            $price_total = 0;
                        @endphp
                        @foreach ($cart_products as $item)
                        {{-- listar productos del carrito --}}
                        <div class="shopping-cart">
                            {{-- imagen --}}
                            <figure>
                                <img src="{{ asset("product/{$item['product']->image}") }}" alt="{{ $item['product']->name }}">
                            </figure>
                            <div>
                                <p>{{ $item['product']->name }}</p>
                                <p>{{ $item['product']->price}}$</p>
                            </div>
                            <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src="{{ asset('icons/close.svg') }}" alt="close">
                                </button>
                            </form>
                        </div>
                        @php
                        if ($item['quantity'] > 1) {
                          $price_item = $item['quantity'] * $item['product']->price;
                          $price_total += $price_item;
                        }else{
                          $price_total += $item['product']->price;
                        }
                        @endphp

                        @endforeach
                    </div>
                    <div class="order">
                        <p>
                          <span class="span_total">Total</span>
                        </p>
                        <p>{{ $price_total }}$</p>
                    </div>

                    <a href="{{ route('cart.index') }}" class="link_detail_cart">Ver detalle del carrito</a>

                    <a href="{{ route('cart.index') }}" class="primary-button">
                        Confirmar
                    </a>
                </div>
            </aside>
          </div>
      </div>
  </div>


  <div class="mobile-navbar">
    @auth
    <div class="mobile_navbar--header">
        <p>Bienvenido, {{ Auth::user()->name }}</p>
    </div>
    @endauth
    <div class="mobile_navbar--container">
        <ul>
            <li><a href="{{ route('about') }}" class="underline">Nosotros</a></li>
            <li><a href="{{ route('contact') }}" class="underline">Contacto</a></li>
            <li><a href="{{ route('project') }}" class="underline">Proyectos</a></li>
            @foreach ($categories as $category)
            <li class="mobile-menu" id="submenu-down">
                <p class="line-down underline" id="submenu-down-two">
                    Linea de {{ $category->name }}
                    <i class="fa-solid fa-angle-down" id="angle"></i>
                </p>
                <ul class="mobile-submenu">
                @foreach ($category->subcategories as $subcategory)
                    <li><a href="{{ route('products_by_subcategory', $subcategory->id) }}" class="underline">{{ $subcategory->name }}</a></li>
                @endforeach
                </ul>
            </li>
            @endforeach
        </ul>

        @auth
        <ul class="mobile_menu_bottom">
            <li><a href="#" class="underline">Mi cuenta</a></li>
            <li><a href="{{ route('order.index') }}" class="underline">Mis Pedidos</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Cerrar sesion</button>
                </form>
            </li>
        </ul>
        @else
        <ul class="mobile_menu_bottom">
            <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
        </ul>
        @endauth
    </div>
  </div>
</nav>