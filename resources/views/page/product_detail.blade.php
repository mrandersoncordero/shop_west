@extends('template')

@section('head_content')
  <title>Pegoccidente - Article {{ $product->name }}</title>
@endsection

@section('content')
  <main style="margin-top: 5%">
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif
    <section class="banner-top" style="background-image: url({{ asset('images/banner_pego.png') }});">
    </section>

    <div class="menu_between_views" style="margin-top: 24px">
      <ul>
        <li>
          <a href="{{ route('index') }}"><i class="fa-solid fa-house"></i></a>
        </li>
        <div class="separation_section_menu">
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <li>
          <a href="{{ route('products_by_category', $product->subcategory->category->id) }}">{{$product->subcategory->category->name}}</a>
        </li>
        <div class="separation_section_menu">
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <li>
          <a href="{{ route('products_by_subcategory', $product->subcategory->id) }}">{{$product->subcategory->name}}</a>
        </li>
        <div class="separation_section_menu">
          <i class="fa-solid fa-angle-right"></i>
        </div>
        <li>
          <a href="{{ route('product_detail', $product->id) }}" class="latest_section">{{ $product->name}}</a>
        </li>
      </ul>
    </div>
    {{-- @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif --}}
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

            @auth
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="container_add--truck">
              @csrf
              <button type="submit" class="margin-top-content">
                <div><img src="{{ asset('icons/camion_compra.png') }}" alt=""><p>Agregar al carrito</p></div>
              </button>
            </form>
            @endauth
          </article>
          
        </section>
      </article>
    </section>

  </main>

@include('templates.footer')
@endsection