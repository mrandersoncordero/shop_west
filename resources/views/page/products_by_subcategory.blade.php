@extends('template')

@section('head_content')
  <title>Productos Occidente - Subcategoria {{ $subcategory->name }} </title>
<meta name="description" content="En Productos Occidente, nos dedicamos a la fabricación de pegamentos y morteros de construcción. Contamos con una amplia experiencia en el sector, desde 1983, lo que nos ha permitido desarrollar productos de la más alta calidad. Nuestros productos están fabricados con los mejores materiales y bajo los más estrictos controles de calidad. Esto nos permite ofrecer a nuestros clientes productos duraderos y resistentes, permitiendo que las obras perduren en el tiempo">
<meta name="keywords" content="Pego standard gris, Pego extra blanco premium, premium gris grueso, Súper Extra Blanco, Super Standard Gris, Súper Extra Porcelanato, Súper Extra Piscina, Pego Supremo Blanco,	Occifriso,	Occimix,	Stuco,	Imperplus,	Occibloque,	Occiteja,	Occiconcreto, D' COLOR
">	





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
          Sublinea {{ $subcategory->name}}
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
            <a href="{{ route('products_by_category', $subcategory->category->id) }}">{{ $subcategory->category->name }}</a>
          </li>
          <div class="separation_section_menu">
            <i class="fa-solid fa-angle-right"></i>
          </div>
          <li>
            <a href="{{ route('products_by_subcategory', $subcategory->id) }}" class="latest_section">{{ $subcategory->name }}</a>
          </li>
        </ul>
      </div>
      <article class="products">
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
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="container_add--truck center_content ">
              @csrf
              <button type="submit">
                <div><img src="{{ asset('icons/camion_compra.png') }}" alt=""></div>
              </button>
            </form>
            @endauth
          </div>
        </section>
      @endforeach
      </article>
    </section>
    @include('page.partials.display_whatsapp')
  </main>

@include('templates.footer')
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
@endsection
