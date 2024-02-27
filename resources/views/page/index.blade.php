@extends('template')

@section('head_content')
<title>Productos Occidente</title>
<meta name="description" content="En Productos Occidente, nos dedicamos a la fabricación de pegamentos y morteros de construcción. Contamos con una amplia experiencia en el sector, desde 1983, lo que nos ha permitido desarrollar productos de la más alta calidad. Nuestros productos están fabricados con los mejores materiales y bajo los más estrictos controles de calidad. Esto nos permite ofrecer a nuestros clientes productos duraderos y resistentes, permitiendo que las obras perduren en el tiempo">
<meta name="keywords" content="Pego standard gris, Pego extra blanco premium, premium gris grueso, Súper Extra Blanco, Super Standard Gris, Súper Extra Porcelanato, Súper Extra Piscina, Pego Supremo Blanco,	Occifriso,	Occimix,	Stuco,	Imperplus,	Occibloque,	Occiteja,	Occiconcreto, D' COLOR
">	
<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">

@endsection

@section('content')
<div class="gif">
    <video  autoplay loop muted playsinline>
        <source src="{{ asset('images/empresa_lider.mp4') }}" type="video/mp4" />
    </video>
    <audio id="miAudio" controls autoplay style="display: none;">
        <source src="{{ asset('audio/corporation.mp3') }}" type="audio/mp3">
        Tu navegador no soporta el elemento de audio.
    </audio>
    
    <button id="reproducirBtn" onclick="togglePlayPause()">▶️</button>
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
    
    <section class="section_catalog">
        <article>
            <div>
                <h2>Descarga nuestro catalogo</h2>
                <!-- Button trigger modal -->
                <button onclick="loadModalScript()" type="button" class="btn" style="background-color: var(--blue); color: #fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                
                                <input type="hidden" name="name_mail" value="catalog">
                                <button type="submit" class="btn" style="background-color: var(--blue); color: #fff;">Enviar</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                  
            </div>
            <img src="{{ asset('images/portada_catalogo.png') }}" alt="">
        </div>
    </section>

    <div class="glide" style="position: relative" id="space1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
                <img src="{{ asset('images/banners/banner_1.jpg') }}" class="image_slide" alt="" style="width: 100%; height: 100%;">
            </li>
            <li class="glide__slide">
                <img src="{{ asset('images/banners/banner_2.jpg') }}" class="image_slide" alt="" style="width: 100%; height: 100%;">
            </li>
            <li class="glide__slide">
                <img src="{{ asset('images/banners/banner_3.jpg') }}" class="image_slide" alt="" style="width: 100%; height: 100%;">
            </li>
          </ul>
        </div>

        <div class="glide" style="position: initial" id="space1">

          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<" aria-label="Arrow Left"><i class="fa-solid fa-angle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">" aria-label="Arrow Right"><i class="fa-solid fa-angle-right"></i></button>
          </div>
        </div>
    </div>
    
    <section class="categories">
        <header>
            <h1 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Categorias<i class="fa-solid fa-quote-right quotes"></i></h1>
        </header>
        <article class="container-categories">
            <div class="category">
                <a 
                    href="{{ route('products_by_category', 1) }}" 
                    style="background: url({{asset('images/categoriy_pegamento.jpg')}}); display: flex; align-items: center; justify-content: center;"
                    aria-label="Categoria Pegamentos"
                >
                <img src="{{ asset('icons/pegamentos.png') }}" alt="Pegamentos" width="50%">
                </a>
                <p>
                    <a href="{{ route('products_by_category', 1) }}" style="color: var(--blue)">Linea de pegamentos</a>
                </p>
            </div>
            <div class="category">
                <a 
                    href="{{ route('products_by_category', 2) }}" 
                    style="background: url({{asset('images/category_construccion.jpg')}}); display: flex; align-items: center; justify-content: center;"
                    aria-label="Categoria Contruccion"
                >
                    <img src="{{ asset('icons/contruccion.png') }}" alt="Construccion" width="50%">
                </a>
                <p>
                    <a href="{{ route('products_by_category', 2) }}"  style="color: var(--red)">Linea de construcción</a>
                </p>
            </div>
            <div class="category">
                <a 
                    href="{{ route('products_by_category', 3) }}"  
                    style="background: url({{asset('images/category_sella_juntas.jpg')}}); display: flex; align-items: center; justify-content: center;"
                    aria-label="Categoria Sella Juntas"
                >
                    <img src="{{ asset('icons/sella_juntas.png') }}" alt="Sella Juntas" width="50%">
                </a>
                <p>
                    <a href="{{ route('products_by_category', 3) }}"  style="color: var(--blue)">Linea de sella juntas</a>
                </p>
            </div>
        </article>
    </section>

    <section class="projects">
        <header>
            <h2 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Proyectos<i class="fa-solid fa-quote-right quotes"></i></h2>
        </header>
        <div class="container">
            <div class="glide" style="position: relative" id="space2">
    
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/lidotel.png') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/catedral.jpg') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/proyecto_esmeralda.jpeg') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/parque_la_musica.png') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                        <li class="glide__slide">
                            <img src="{{ asset('images/projects/biotel.jpg') }}" alt="" style="width: 100%; height: 300px;">
                        </li>
                    </ul>
                </div>
    
                <div class="glide" style="position: initial" id="space2">
    
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<" aria-label="Arrow Left"><i class="fa-solid fa-angle-left"></i></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">" aria-label="Arrow Right"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="" style="margin: 20px">
        <header>
            <h2 class="h2"><i class="fa-solid fa-quote-left quotes"></i>Testimonios<i class="fa-solid fa-quote-right quotes"></i></h2>
        </header>
        <div class="glide" style="position: relative" id="space3">

            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <div class="testimony_container">
                            <div class="testimony_text">
                                <p>Productos Occidente ha formado parte de la familia Coseimpa desde hace 19 años aproximadamente, brindando calidad en sus productos para la construcción y asegurando un servicio profesional y eficiente. Por ello, estamos contentos de que sean nuestros aliados comerciales.</p>
                            </div>
                            <div class="testimony_data_user">
                                <div class="testimony_user">
                                    <img src="{{ asset('images/coseimpa.webp') }}" alt="Coseimpa aliado comercial" style="width: 100px; height: 80px;">
                                </div>
                            </div>
                            <img src="{{ asset('icons/quote-left.svg')}}" class="quote-left" alt="Quote left">
                            <img src="{{ asset('icons/quote-right.svg')}}" class="quote-right" alt="Quto Right">
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="testimony_container">
                            <div class="testimony_text">
                                <p> Productos Occidente no solo cumple con nuestros estándares de calidad, sino que también ha demostrado ser un socio comercial confiable. Su experiencia desde 1983 habla por sí misma, y estamos encantados de seguir colaborando con ellos para ofrecer a nuestros clientes los mejores productos para la construcción.</p>
                            </div>
                            <div class="testimony_data_user">
                                <div class="testimony_user">
                                    <img src="{{ asset('images/alpeca.webp') }}" alt="Alpeca aliado comercial" style="width: 150px; height: 55px;">
                                </div>
                            </div>
                            <img src="{{ asset('icons/quote-left.svg')}}" class="quote-left" alt="Quote left">
                            <img src="{{ asset('icons/quote-right.svg')}}" class="quote-right" alt="Quto Right">
                        </div>
                    </li>
                    <li class="glide__slide">
                        <div class="testimony_container">
                            <div class="testimony_text">
                                <p>El Palacio del Caico se enorgullece de ser aliado de Productos Occidente, con excepcionales servicios y productos de primera categoría. La amplia gama de productos, como pegamentos, estucos y adhesivos, es fundamental para brindar soluciones de alta calidad a nuestros clientes.</p>
                            </div>
                            <div class="testimony_data_user">
                                <div class="testimony_user">
                                    <img src="{{ asset('images/palacio_del_caico.webp') }}" alt="Alpeca aliado comercial" style="width: 150px; height: 80px;">
                                </div>
                            </div>
                            <img src="{{ asset('icons/quote-left.svg')}}" class="quote-left" alt="Quote left">
                            <img src="{{ asset('icons/quote-right.svg')}}" class="quote-right" alt="Quto Right">
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="glide">
                <div class="glide__track" data-glide-el="track"></div>
              
                <div class="glide__bullets" data-glide-el="controls[nav]">
                  <button class="glide__bullet" data-glide-dir="=0" aria-label="Bullet 0"></button>
                  <button class="glide__bullet" data-glide-dir="=1" aria-label="Bullet 1"></button>
                  <button class="glide__bullet" data-glide-dir="=2" aria-label="Bullet 2"></button>
                </div>
            </div>
        </div>
    </div>
    @include('page.partials.display_whatsapp')
</main>

@include('templates.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    let products = @json($products);
</script>
<script src="{{ asset('js/productos_destacados.js') }}"></script>
<script src="{{ asset('js/glide.min.js') }}"></script>
<script src="{{ asset('js/audio_play.js') }}"></script>
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
<script>
    const config1 = {
      type: 'carousel',
      perView: 1
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
        startAt: 1,
        perView: 2,
        focusAt: 'center',
        breakpoints: {
            800: {
            perView: 1
            },
        }
    };
    const glide1 = new Glide('#space3', config3).mount();
</script>
@endsection
