@extends('template')

@section('title', $metaData['title'])
@section('description', $metaData['description'])
@section('keywords', $metaData['keywords'])
@section('og_title', $metaData['title'])
@section('og_description', $metaData['description'])

@section('content')
  <main style="margin-top: 5%; display: flex; flex-direction: column; justify-content: space-between; min-height: 100vh;">
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif
    <section class="banner-top" style="background-image: url({{ asset('images/banners/banner_pego.png') }});">
    </section>

    <section class="container_products">
      <header class="header_line">
        <h1>Busqueda relacionada con "{{ $search }}"</h1>
      </header>

      <article class="products">
      @foreach ($products as $product)
        <section class="product_card">
          <div class="product_img">
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
