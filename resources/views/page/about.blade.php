@extends('template')

@section('title', $metaData['title'])
@section('description', $metaData['description'])
@section('keywords', $metaData['keywords'])
@section('og_title', $metaData['title'])
@section('og_description', $metaData['description'])

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
  <!-- Optional Theme Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')

  <main>
    @if (session('message'))
      @include('templates.message')
    @endif
    <div class="banner">
      <img src="{{ asset('images/banners/banner_pego.png') }}" style="margin:0px;" class="banner_image">
    </div>

    <header class="header_line" style="margin-bottom: 24px">
      <h1>Sobre nosotros</h1>
    </header>
    <section class="content_primary">
      <article class="" style="display: flex; align-items: center; justify-content: center;">
        <img src="{{ asset('images/puntos_occidente2.webp') }}" alt="" style="width: 60%">
      </article>
      <div class="glide carrousel_glide_white" style="position: relative">

        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">

              <div class="content_about">
                <div class="title_about">
                  <img src="{{ asset('images/diana.png') }}" alt="">
                  <header>
                    <h2>Nuestra historia</h2>
                  </header>
                </div>
                <p>Hace más de 40 años, en el corazón de Venezuela, nació una empresa dedicada a la excelencia en la
                  fabricación de productos de construcción. En Productos Occidente, hemos forjado una reputación de
                  calidad inigualable respaldada por décadas de experiencia y compromiso. Descubre quiénes somos y lo que
                  nos hace destacar en la industria.</p>
                <p>Durante cuatro décadas, hemos sido una parte fundamental del mercado laboral venezolano. Nuestra
                  historia es un testimonio de perseverancia, innovación y calidad constante. Desde nuestros humildes
                  comienzos hasta convertirnos en líderes de la industria, hemos mantenido el compromiso con nuestros
                  valores.</p>
              </div>

            </li>
            <li class="glide__slide">

              <div class="content_about">
                <div class="title_about">
                  <img src="{{ asset('images/diana.png') }}" alt="">
                  <header>
                    <h2>Misión</h2>
                  </header>
                </div>
                <p>Somos una Empresa dedicada a la fabricación y comercialización de pegamentos, morteros y sella juntas
                  para el sector de la construcción, remodelación y decoración, nuestros productos son de excelente
                  calidad, óptimo rendimiento, alta resistencia, durabilidad y fácil uso; empleamos tecnología de punta y
                  capital humano altamente capacitado, para brindar así a nuestros clientes la mejor relación precio –
                  valor del mercado.</p>
              </div>

            </li>
            <li class="glide__slide">

              <div class="content_about">
                <div class="title_about">
                  <img src="{{ asset('images/diana.png') }}" alt="">
                  <header>
                    <h2>Visión</h2>
                  </header>
                </div>
                <p>Consolidar nuestro liderazgo en el mercado nacional en la fabricación y comercialización de una diversa
                  gama de productos de avanzada y novedosa formulación en pro de soluciones transformadoras de la
                  industria de la construcción, remodelación y decoración, con el fin de garantizar su progreso, el
                  incremento continuo de la cartera de clientes, su satisfacción y una mejor calidad de vida.</p>
              </div>

            </li>
          </ul>
        </div>
        <div class="glide" style="position: initial">

          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i
                class="fa-solid fa-angle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i
                class="fa-solid fa-angle-right"></i></button>
          </div>
        </div>
      </div>
    </section>
    <section class="sucursales">
      <article class="container_sucursales--info">
        <header>
          <img src="{{ asset('icons/location_west.png') }}" alt="">
          <h2>Sucursales</h2>
        </header>
        <div class="sucursal--content">
          <p>Contamos con dos sucursales estratégicamente ubicadas en Venezuela. Una de nuestras sedes se encuentra en
            Trujillo, mientras que la segunda está ubicada en Lara. Esta distribución nos permite atender a un público más
            amplio y garantizar un acceso más eficiente a nuestros productos de alta calidad.</p>
        </div>
      </article>
      <article class="container_sucursales--image">
        <div class="sucursal">
          <img src="{{ asset('images/planta-barquisimeto.png') }}" alt="">
          <div>
            <p>Lara</p>
          </div>
        </div>
        <div class="sucursal">
          <img src="{{ asset('images/planta-trujillo.jpeg') }}" alt="">
          <div>
            <p>Trujillo</p>
          </div>
        </div>
      </article>
    </section>

    @include('page.partials.display_whatsapp')
  </main>

  @include('templates.footer')

  <script src="{{ asset('js/productos_destacados.js') }}"></script>
  <script src="{{ asset('js/glide.min.js') }}"></script>
  <script src="{{ asset('js/display_whatsapp.js') }}"></script>
  <script>
    const config = {
      type: 'slider',
      perView: 1,
    };
    new Glide('.glide', config).mount()
  </script>
@endsection
