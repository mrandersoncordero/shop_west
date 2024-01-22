@extends('template')

@section('head_content')
<title>Pegoccidente - Shop</title>
<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/project.css') }}">

@endsection

@section('content')

  
<main>
    <div class="banner">
        <img src="{{ asset('images/banner_pego.png') }}" style="margin:0px;" class="banner_image">
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
                    <div class="front" style="background-image: url({{ asset('images/projects/biotel.png') }})">
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</main>

@include('templates.footer')

<script src="{{ asset('js/productos_destacados.js') }}"></script>
<script src="{{ asset('js/glide.min.js') }}"></script>
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