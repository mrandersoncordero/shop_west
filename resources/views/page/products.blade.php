@extends('template')

@section('head_content')
  <title>Pegoccidente - Products</title>
	<meta name="description" content="Descubre nuestra amplia gama de productos de alta calidad para la construcción, que incluye sublíneas de basica, profesional, flexible, revestimiento, pegamentos, estructural y sellas juntas. Con Productos Occidente, puedes confiar en la calidad y durabilidad de tus proyectos. Visita nuestra página web para explorar nuestra amplia gama de productos y encontrar la solución perfecta para tus necesidades de construcción.">
  <meta name="keywords" content="Pego Standard Gris, Pego Extra Blanco,	Premium Gris, Pego Premium Gris Grueso, Súper Extra Piscina, Pego Supremo Blanco, Occifriso, Occiteja, Occiconcreto, Occiconcreto Reforzado
">	


  {{-- Glide js --}}
  <link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
@endsection

@section('content')
  <main style="margin-top: 5%">
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif
    <section class="banner-top" style="background-image: url({{ asset('images/banners/banner_pego.png') }});">
    </section>

    <article class="container_carrousel">
      <header class="header_line"  style="margin-bottom: 24px">
        <h1>
          Linea de pegamentos
          <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia2" alt="sello de garantia">
        </h1>
      </header>

      <section class="glide" style="position: relative" id="space1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            @foreach ($products as $product)
              @if ($product->subcategory->category->id == 1) 
              {{--  Pegamentos --}}
              <li class="glide__slide align_items_carrousel">
                <div class="products_carrousel--container">
                  <div class="garantia">
                    <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia" alt="sello de garantia">
                  </div>
                  <img src="{{ asset("product/$product->image" )}}" alt="">
                  <div>
                    <a href="{{ route('product_detail', $product->id) }}">ver descripcion</a>
                  </div>
                </div>
              </li> 
              @endif 
            @endforeach
          </ul>
        </div>

        <div class="glide" style="position: initial" id="space1">

          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right"></i></button>
          </div>
        </div>
      </section>
    </article>

    <section class="banner-top" style="background-image: url({{ asset('images/categories/construccion.png') }});">
      <div></div>
    </section>

    <article class="container_carrousel">
      <header class="header_line" style="margin-bottom: 24px">
        <h1>
          Linea de construccion
          <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia2" alt="sello de garantia">
        </h1>
      </header>

      <section class="glide" style="position: relative" id="space2">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            @foreach ($products as $product)
              @if ($product->subcategory->category->id == 2) 
              {{--  Construccion --}}
              <li class="glide__slide align_items_carrousel">
                <div class="products_carrousel--container">
                  <div class="garantia">
                    <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia" alt="sello de garantia">
                  </div>
                  <img src="{{ asset("product/$product->image" )}}" alt="">
                  <div>
                    <a href="{{ route('product_detail', $product->id) }}">ver descripcion</a>
                  </div>
                </div>
              </li> 
              @endif 
            @endforeach
          </ul>
        </div>

        <div class="glide" style="position: initial" id="space2" >

          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right"></i></button>
          </div>
        </div>
      </section>

    </article>

    <section class="banner-top" style="background-image: url({{ asset('images/categories/sella_juntas.png') }});">
      <div></div>
    </section>

    <article class="container_carrousel">
      <header class="header_line" style="margin-bottom: 24px">
        <h1>
          Linea de sella juntas
          <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia2" alt="sello de garantia">
        </h1>
      </header>

      <section class="glide" style="position: relative" id="space3">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            @foreach ($products as $product)
              @if ($product->subcategory->category->id == 3) 
              {{--  Sella Juntas --}}
              <li class="glide__slide align_items_carrousel">
                <div class="products_carrousel--container">
                  <div class="garantia">
                    <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia" alt="sello de garantia">
                  </div>
                  <img src="{{ asset("product/$product->image" )}}" alt="">
                  <div>
                    <a href="{{ route('product_detail', $product->id) }}">ver descripcion</a>
                  </div>
                </div>
              </li> 
              @endif 
            @endforeach
          </ul>
        </div>

        <div class="glide" style="position: initial" id="space3" >

          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right"></i></button>
          </div>
        </div>
      </section>

    </article>
  </main>
  @include('templates.footer')

@endsection

@section('scripts')
  <script src="{{ asset('js/glide.min.js') }}"></script>
  <script>
    const config1 = {
      type: 'carousel',
      perView: 3,
      breakpoints: {
          1024: {
              perView: 2
          },
          600: {
              perView: 1
          }
      }
    };
    new Glide('#space1', config1).mount()

    const config2 = {
      type: 'carousel',
      perView: 3,
      breakpoints: {
          1024: {
              perView: 2
          },
          600: {
              perView: 1
          }
      }
    };
    new Glide('#space2', config2).mount()

    const config3 = {
      type: 'carousel',
      perView: 3,
      breakpoints: {
          1024: {
              perView: 2
          },
          600: {
              perView: 1
          }
      }
    };
    new Glide('#space3', config3).mount()
  </script>
@endsection
