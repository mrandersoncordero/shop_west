@extends('template')

@section('head_content')
  <title>Pegoccidente - Article {{ $product->name }}</title>
@endsection

@section('content')
  <main style="margin-top: 5%">
    <section class="banner-top" style="background-image: url({{ asset('images/banner_pego.png') }});">
    </section>

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
          <a href="#">{{$product->subcategory->category->name}}</a>
        </li>
        <div class="separation_section_menu">
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <li>
          <a href="{{ route('product_detail', $product->id) }}" class="latest_section">{{ $product->name}}</a>
        </li>
      </ul>
    </div>

    <section class="container_product_detail">
      <article class="container_image--product">
        <section>
          {{-- Imagen --}}
          <div class="diana_detail--primary">
            <div class="diana_detail--secondary">
              <img src="{{ asset("product/$product->image" )}}" alt="">
            </div>
          </div>
        </section>

        <section class="content_detail--product">
          {{-- Detail --}}
          <header>
            <h2>{{ $product->name }}</h2>
          </header>
          <article>
            <p class="description">{{ $product->description }}</p>
            <div class="specifications">
              <div>
                <p><span>Peso:</span> {{ $product->weight }} kg</p>
              </div>
              <div>
                <p><span>Rendimiento:</span> {{ $product->yield }}</p>
              </div>
              <div>
                <p><span>Formato:</span> {{ $product->format }}</p>
              </div>
              <div>
                <p><span>Trafico:</span> {{ $product->traffic }}</p>
              </div>
            </div>

            <form class="container_add--truck">
              <button>
                <div>Agregar al carrito</div>
              </button>
            </form>
          </article>
          
        </section>
      </article>
    </section>

  </main>

@include('templates.footer')
@endsection

@section('scripts')
    
@endsection