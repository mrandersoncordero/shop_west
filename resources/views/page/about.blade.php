@extends('template')

@section('head_content')
<title>Pegoccidente - Shop</title>
<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

@endsection

@section('content')
  
<main>
    <header class="header_line"  style="margin-bottom: 24px">
        <h1>Sobre nosotros</h1>
    </header>
    <section class="content_primary">
        <article class="">
            <img src="{{ asset('images/about.png')}}" alt="">
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
                            <p>Hace más de 40 años, en el corazón de Venezuela, nació una empresa dedicada a la excelencia en la fabricación de productos de construcción. En Productos Occidente, hemos forjado una reputación de calidad inigualable respaldada por décadas de experiencia y compromiso. Descubre quiénes somos y lo que nos hace destacar en la industria.</p>
                            <p>Durante cuatro décadas, hemos sido una parte fundamental del mercado laboral venezolano. Nuestra historia es un testimonio de perseverancia, innovación y calidad constante. Desde nuestros humildes comienzos hasta convertirnos en líderes de la industria, hemos mantenido el compromiso con nuestros valores.</p>
                        </div>

                    </li>
                    <li class="glide__slide">

                        <div class="content_about">
                            <div class="title_about">
                                <img src="{{ asset('images/diana.png') }}" alt="">
                                <header>
                                    <h2>mision y vision</h2>
                                </header>
                            </div>
                            <p>Nuestra misión es simple pero poderosa: brindar productos de construcción que superen las expectativas de calidad. Nos esforzamos por ser líderes en la industria y ser la elección número uno de quienes buscan productos confiables y duraderos.</p>
                            <p>Miramos hacia el futuro con determinación. Queremos seguir siendo líderes en la industria de la construcción, innovando constantemente y expandiendo nuestro alcance para servir a un público cada vez más diverso.</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="glide" style="position: initial">
    
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left"></i></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right"></i></button>
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
                <p>Contamos con dos sucursales estratégicamente ubicadas en Venezuela. Nuestra sede principal se encuentra en Trujillo, donde todo comenzó. La segunda sucursal se encuentra en Lara, lo que nos permite atender a un público más amplio y garantizar un acceso más eficiente a nuestros productos de alta calidad.</p>
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
                <img src="{{ asset('images/planta-barquisimeto.png') }}" alt="">
                <div>
                    <p>Trujillo</p>
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
        perView: 1,
    };
    new Glide('.glide', config).mount()
</script>
@endsection