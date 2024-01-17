@extends('template')

@section('head_content')
<title>Pegoccidente - Shop</title>
<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@endsection

@section('content')
<div class="gif">
    <img src="{{ asset('images/empresa_lider.gif') }}" alt="pego gif">
</div>
  
<main>
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif

    <section class="product-section">
        <header class="header_line" style="margin-bottom: 24px">
            <h1>Productos confiables de construcción y adhesivos</h1>
        </header>
        <article class="productos-destacados" style="padding-top: 12px">
            <div class="content">
                <div class="titulo-destacado">
                    <div><i class="fa-solid fa-star"></i></div>
                    <h2>Destacados</h2>
                </div>
                <div>
                    @foreach ($products as $item)
                    <header>
                        <h3 class="titulo-producto-destacado">{{ $item->name }}</h3>
                    </header>
                    <p id="descripcion-producto">
                        {{ $item->description }} 
                    </p>
                    @break
                    @endforeach
                    <a href="{{ route('products_view') }}">IR A PRODUCTOS</a>
                </div>
            </div>
            <div class="diana-de-productos">
                <div class="diana-container">
                    <div class="diana-principal">
                        @foreach ($products as $key => $product)
                            @if ($key === 0)
                                <div class="diana-secundaria">
                                    <img src="{{ asset("product/$product->image" )}}" class="diana-imagen-principal" id="{{$key}}" alt="{{ $product['name'] }}">
                                </div>
                            @else
                                <div class="imagen-destacada-{{$key}}">
                                    <img src="{{ asset("product/$product->image" )}}" class="diana-imagen-secundaria" id="{{$key}}" alt="{{ $product['name'] }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </section>

    <div class="banner">
        <img src="{{ asset('images/calidad_que_perdura.jpg') }}" alt="" class="banner_image_2">
    </div>
    
    <section class="section_catalog">
        <article>
            <div>
                <h2>Descarga nuestro catalogo</h2>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Descargar
                </button>
                  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresa los datos</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ route('interested-clients.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="first_name" class="form-label">Nombre</label>
                                  <input type="text" name="first_name" class="form-control" id="first_name">
                                </div>
                                <div class="mb-3">
                                  <label for="last_name" class="form-label">Apellido</label>
                                  <input type="text" name="last_name" class="form-control" id="last_name">
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Correo</label>
                                  <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="accept" value="1">
                                    <label class="form-check-label" name="accept" for="accept">Aceptas recibir promociones y descuentos?</label>
                                </div>                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                  
            </div>
            <img src="{{ asset('images/portada_catalogo.png') }}" alt="">
        </div>
    </section>

    <section class="categories">
        <header>
            <h1 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Categorias<i class="fa-solid fa-quote-right quotes"></i></h1>
        </header>
        <article class="container-categories">
            <div class="category">
                <a href="#" style="background: url({{asset('images/categoriy_pegamento.jpg')}}); display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('icons/pegamentos.png') }}" alt="" width="50%">
                </a>
                <p>
                    <a href="#" style="color: var(--blue)">Linea de pegamentos</a>
                </p>
            </div>
            <div class="category">
                <a href="#" style="background: url({{asset('images/category_construccion.jpg')}}); display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('icons/contruccion.png') }}" alt="" width="50%">
                </a>
                <p>
                    <a href="#" style="color: var(--red)">Linea de construcción</a>
                </p>
            </div>
            <div class="category">
                <a href="#" style="background: url({{asset('images/category_sella_juntas.jpg')}}); display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('icons/sella_juntas.png') }}" alt="" width="50%">
                </a>
                <p>
                    <a href="#" style="color: var(--blue)">Linea de sella juntas</a>
                </p>
            </div>
        </article>
    </section>

    <div class="banner">
        <img src="{{ asset('images/siempre_imitados_nunca_igualados.jpg') }}" alt="" class="banner_image_2">
    </div>

    <section class="projects">
        <header>
            <h2 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Proyectos<i class="fa-solid fa-quote-right quotes"></i></h2>
        </header>
        <div class="container">
            <div class="glide" style="position: relative">
    
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/lidotel.png') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/catedral.jpg') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/parque_la_musica.png') }}" alt="" style="width: 100%; height: 300px;">
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
        </div>
    </section>
</main>

@include('templates.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    let products = @json($products);
</script>
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