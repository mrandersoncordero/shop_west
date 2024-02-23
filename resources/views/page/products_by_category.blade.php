@extends('template')

@section('head_content')
  <title>Pegoccidente - Category {{ $category->name }} </title>
	<meta name="description" content="Descubre nuestra amplia gama de productos de alta calidad para la construcción, que incluye morteros, pegamentos y selladores. Con nuestra línea de construcción, garantizamos la durabilidad y resistencia de tus proyectos. Nuestra línea de pegamentos ofrece soluciones efectivas para unir y sellar, mientras que nuestra línea de sella juntas protege la integridad estructural. Confía en Productos Occidente para encontrar la solución perfecta para tus necesidades de construcción.">
  <meta name="keywords" content="Linea de Pegamentos Productos Occidente, Linea de Morteros Productos Occidente, Linea de Sella Juntas Productos Occidente, Nardi Industrias Barquisimeto, Nardi Industrias Trujillo, Pego Occidente, Pego Occidente Barquisimeto, Pego Occidente Trujillo, Pego Occidente Venezuela">	

@endsection

@section('content')
  <main style="margin-top: 5%">
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif
    <section class="banner-top" style="background-image: url({{ asset('images/banners/banner_pego.png') }});">
    </section>

    <section class="container_products">
      <header class="header_line">
        <h1>
          Linea de {{ $category->name}}
          <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia2" alt="sello de garantia">
        </h1>
      </header>
      
      <div class="menu_between_views">
        <ul>
          <li>
            <a href="{{ route('index') }}"><i class="fa-solid fa-house"></i></a>
          </li>
          <div class="separation_section_menu">
            <i class="fa-solid fa-angle-right"></i>
          </div>
          <li>
            <a href="{{ route('products_view') }}">Productos</a>
          </li>
          <div class="separation_section_menu">
            <i class="fa-solid fa-angle-right"></i>
          </div>
          <li>
            <a href="{{ route('products_by_category', $category->id) }}" class="latest_section">{{ $category->name }}</a>
          </li>
        </ul>
      </div>

      <article class="products">
      @foreach ($category->subcategories as $subcategory)
        @foreach ($subcategory->products as $product)
        <section class="product_card">
          <div class="product_img">
            <div class="garantia">
              <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia" alt="sello de garantia">
            </div>
            <a href="{{ route('product_detail', $product->id) }}"><img src="{{ asset("product/$product->image" )}}" alt="{{ $product->name }}"></a>
          </div>
          <div class="product_despcription">
            <a href="{{ route('product_detail', $product->id) }}">{{ $product->name }}</a>
            @auth
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="container_add--truck center_content">
              @csrf
              <button type="submit">
                <div><img src="{{ asset('icons/camion_compra.png') }}" alt=""></div>
              </button>
            </form>
            @endauth
          </div>
        </section>
        @endforeach
      @endforeach
      </article>
    </section>
    @include('page.partials.display_whatsapp')
  </main>

@include('templates.footer')
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
@endsection
