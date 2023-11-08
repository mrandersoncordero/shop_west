@extends('template')

@section('head_content')
  <title>Pegoccidente - Category {{ $category->name }} </title>
@endsection

@section('content')
  <main style="margin-top: 5%">
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif
    <section class="banner-top" style="background-image: url({{ asset('images/banner_pego.png') }});">
    </section>

    <section class="container_products">
      <header class="header_line">
        <h1>Linea de {{ $category->name}}</h1>
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
            <a href="{{ route('product_detail', $product->id) }}"><img src="{{ asset("product/$product->image" )}}" alt="{{ $product->name }}"></a>
          </div>
          <div class="product_despcription">
            <a href="{{ route('product_detail', $product->id) }}">{{ $product->name }}</a>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="container_add--truck center_content">
              @csrf
              <button type="submit">
                <div><img src="{{ asset('icons/camion_compra.png') }}" alt=""></div>
              </button>
            </form>
          </div>
        </section>
        @endforeach
      @endforeach
      </article>
    </section>
    
  </main>

@include('templates.footer')
@endsection

@section('scripts')
  <script src="{{ asset('js/message.js') }}"></script>
@endsection