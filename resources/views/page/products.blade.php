@extends('template')

@section('head_content')
  <title>Pegoccidente - Products</title>
  {{-- Glide js --}}
  <link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
@endsection

@section('content')
  <main style="margin-top: 5%">
    <section class="banner-top" style="background-image: url({{ asset('images/banner_pego.png') }});">
    </section>

    <article class="container_carrousel">
      <header class="header_line">
        <h1>Linea de pegamentos</h1>
      </header>

      <section class="glide" style="position: relative" id="space1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/Imperplus.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/Imperplus.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/Imperplus.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
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
      <header class="header_line">
        <h1>Linea de construccion</h1>
      </header>

      <section class="glide" style="position: relative" id="space2">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/OccireparadorP.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/OccireparadorP.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/OccireparadorP.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
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
      <header class="header_line">
        <h1>Linea de sella juntas</h1>
      </header>

      <section class="glide" style="position: relative" id="space3">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/PSupremo.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/PSupremo.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
            <li class="glide__slide align_items_carrousel">
              <div class="products_carrousel--container">
                <img src="{{ asset('images/products/PSupremo.png') }}" alt="" style="width: 100%; height: 300px;">
                <div>
                  <a href="#">ver descripcion</a>
                </div>
              </div>
            </li>
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