@extends('template')

@section('head_content')
<title>Pegoccidente - Shop</title>
  <meta name="description" content=" Descubre las obras icónicas que han perdurado en el tiempo gracias a la calidad de los productos de construcción de Productos Occidente. Nuestros morteros, pegamentos y selladores garantizan la durabilidad y resistencia de tus proyectos. Confía en Productos Occidente para encontrar la solución perfecta para tus necesidades de construcción y asegura la calidad y durabilidad de tus obras.">
  <meta name="keywords" content="Catedral de Barquisimeto, Obras con Productos Occidente, Residencias Colinas del Viento, Parque la Musica Barquisimeto, Obras Iconicas Productos Occidente, Stuco, Occiconcreto, Imperplus">	



<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/project.css') }}">

@endsection

@section('content')

  
<main>
    @if (session('message'))
    @include('templates.message')
    @endif
    <div class="banner">
        <img src="{{ asset('images/banners/banner_pego.png') }}" style="margin:0px;" class="banner_image">
    </div>

    <header class="header_line">
        <h1>Proyectos con Nuestros Productos</h1>
    </header>
    <aside style="padding: 24px">
        <p style="line-height: 1.3rem; font-size: 1.2rem; color: var(--grey); text-align: center;">
            Descubre cómo nuestros productos han sido la elección clave en una variedad de proyectos exitosos llevados a cabo por nuestros clientes. Estos proyectos destacan la versatilidad y la calidad de nuestros productos en el mundo real.
        </p>
    </aside>
    <section class="wrapper-cards">
        <article class="cards-container">
            <div class="card_service" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front" style="background-image: url({{ asset('images/projects/parque_la_musica.png') }})">
                        <div class="inner">
                            <p>Parque la musica</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h5>Productos Utilizados:</h5>
                            <ul class="product-list">
                                <li>
                                    <a href="{{ route('product_detail', 11) }}">SÚPER EXTRA PORCELANATO</a>
                                </li>
                                <li>
                                    <a href="{{ route('product_detail', 1) }}">IMPERPLUS</a>
                                </li>
                                <li>
                                    <a href="{{ route('product_detail', 17) }}">STUCO</a>
                                </li>
                                <!-- Agrega más productos según sea necesario -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_service" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front" style="background-image: url({{ asset('images/projects/catedral.jpg') }})">
                        <div class="inner">
                            <p>Catedral</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h5>Productos Utilizados:</h5>
                            <ul class="product-list">
                                <li>
                                    <a href="{{ route('product_detail', 11) }}">SÚPER EXTRA PORCELANATO</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_service" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front" style="background-image: url({{ asset('images/projects/lidotel.png') }})">
                        <div class="inner">
                            <p>Residencia colinas del viento</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h5>Productos Utilizados:</h5>
                            <ul class="product-list">
                                <li>
                                    <a href="{{ route('product_detail', 1) }}">IMPERPLUS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_service" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front" style="background-image: url({{ asset('images/projects/proyecto_esmeralda.jpeg') }})">
                        <div class="inner">
                            <p>Proyecto Esmeralda en Caracas</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h5>Productos Utilizados:</h5>
                            <ul class="product-list">
                                <li>
                                    <a href="{{ route('product_detail', 11) }}">SÚPER EXTRA PORCELANATO</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_service" ontouchstart="this.classList.toggle('hover');">
                <div class="container">
                    <div class="front" style="background-image: url({{ asset('images/projects/biotel.jpg') }})">
                        <div class="inner">
                            <p>Biotel</p>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                            <h5>Productos Utilizados:</h5>
                            <ul class="product-list">
                                <li>
                                    <a href="{{ route('product_detail', 17) }}">STUCO</a>
                                </li>
                                <li>
                                    <a href="{{ route('product_detail', 20) }}">OCCICONCRETO</a>
                                </li>
                                <li>
                                    <a href="{{ route('product_detail', 5) }}">PEGO SUPREMO BLANCO</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
    new Glide('.glide', config).mount()
</script>
@endsection
