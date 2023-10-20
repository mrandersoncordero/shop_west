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
          <li><a href="#" class="underline">Nosotros</a></li>
          <li><a href="#" class="underline">Proyectos</a></li>
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
          <li><a href="#" class="underline">Contacto</a></li>
      </ul>
      <div class="icon-nav">
          <div>
              <form action="" class="form-search">
                  <select name="" class="search-select">
                      <option value="">Pegamentos</option>
                      <option value="">Construccion</option>
                      <option value="">Juntas</option>
                  </select>
                  <div class="div-search-input">
                      <input type="text"  placeholder="Buscar Producto" class="search-input">
                      <button class="button-search">
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                  </div>
              </form>
          </div>
          <div>
            <a href="#"><i class="fa-solid fa-truck"></i></a>
            @if(session()->has('cart'))
                @php
                    $count = 0;
                    $cart = session('cart');
                @endphp
                @foreach ($cart as $item)
                    <span>{{ $count += $item['quantity']}}</span>
                @endforeach
            @endif
          </div>
          <div class="icon-user">
              <a href="#"><i class="fa-solid fa-user"></i></a>
          </div>
          <div class="icon-bars">
              <ion-icon name="reorder-four-outline" id="icon-hamburguer"></ion-icon>
          </div>
      </div>
  </div>


  <div class="mobile-navbar">
      <ul>
          <li><a href="index.html" class="underline">Nosotros</a></li>
          <li><a href="index.html" class="underline">Proyectos</a></li>
          <li class="mobile-menu" id="submenu-down">
              <a href="#" class="line-down underline" id="submenu-down-two">Linea de Pegamentos<i class="fa-solid fa-angle-down" id="angle"></i></ion-icon></a>
              <ul class="mobile-submenu">
                  <li><a href="productos.html#2" class="underline">Basicos<i class="fa-solid fa-angle-right"></i></a></li>
                  <li><a href="productos.html#3" class="underline">Profesional<i class="fa-solid fa-angle-right"></i></a></li>
                  <li><a href="productos.html#4" class="underline">Flexible<i class="fa-solid fa-angle-right"></i></a></li>
              </ul>
          </li>
          <li class="mobile-menu" id="submenu-down">
              <a href="#" class="line-down underline" id="submenu-down-two">Linea de Construccion<i class="fa-solid fa-angle-down" id="angle"></i></ion-icon></a>
              <ul class="mobile-submenu">
                  <li><a href="productos.html#2" class="underline">Revestimiento<i class="fa-solid fa-angle-right"></i></a></li>
                  <li><a href="productos.html#3" class="underline">Pegamentos<i class="fa-solid fa-angle-right"></i></a></li>
                  <li><a href="productos.html#4" class="underline">Estructural<i class="fa-solid fa-angle-right"></i></a></li>
              </ul>
          </li>
          <li><a href="index.html" class="underline">Linea D' Sella Juntas</a></li>
          <li><a href="index.html#contacto" class="underline">Contacto</a></li>
      </ul>
  </div>
</nav>