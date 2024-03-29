@extends('template')

@section('head_content')
  <title>Productos Occidente - Producto {{ $product->name }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/zoom.js/1.7.21/zoom.min.js"></script>
@endsection

@section('content')
  <main style="margin-top: 5%">
    {{-- incluir message --}}
    @if (session('message'))
    @include('templates.message')
    @endif
    <section class="banner-top" style="background-image: url({{ asset('images/banners/banner_pego.png') }});">
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
            <img src="{{ asset("images/sello_de_garantia.png" )}}" class="sello_garantia" alt="sello de garantia">
            <div class="diana_detail--secondary">
              <img src="{{ asset("product/$product->image" )}}"  alt="">
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
              <div>
                <p><span>Tipo de venta:</span> {{ $product->type_of_sale }}</p>
              </div>
              <div>
                <p><span>Cantidad del tipo de venta:</span> {{ $product->quantity }}</p>
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

          <!-- Agrega tu enlace a Font Awesome y tu estilo -->

          <style>
              .checked {
                  color: orange;
              }
          </style>

          <!-- Agrega el contenedor para las estrellas -->
          <div style="display: flex; width:100%; gap: 4px; margin-top: 4px;">
            <span style="">{{ $averageRating }}</span>
            <div class="star-rating" data-rating="{{ $averageRating }}">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $averageRating)
                        <span class="fa fa-star checked"></span>
                    @else
                        <span class="fa fa-star"></span>
                    @endif
                @endfor
            </div>
          </div>
        
          <div style="display: flex; align-items: center; gap: 4px;"> 
            <button type="button" class="btn" style="background-color: var(--blue); color: #fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Obtener ficha del producto
            </button>
            @include('page.partials.modal_form_tab')
            
            @if ($product->palette_color != null || $product->palette_color != '')
            <button type="button" class="btn" style="background-color: var(--blue); color: #fff;" data-bs-toggle="modal" data-bs-target="#ModalPaleta">
              Paleta de colores
            </button>
            @include('page.partials.paleta_colores')
          </div> 
            @endif

        <!-- Agrega tu función de JavaScript -->
        <script>
            // Función para pintar las estrellas
            function paintStars(rating) {
                const stars = document.querySelector('.star-rating');
                const percentage = (rating / 5) * 100; // Convertir la calificación en un porcentaje
                console.log(percentage);
                //stars.style.width = `${percentage}%`; // Establecer el ancho del contenedor de estrellas
            }
            // Obtener el promedio de calificación del contenedor y pintar las estrellas
            const averageRating = parseFloat(document.querySelector('.star-rating').getAttribute('data-rating'));
            paintStars(averageRating);
        </script>

        </section>

        {{-- seccion de comentarios --}}
        <section style="padding: 8px;">

          @auth
          <div>
            <h3>Escribir opinión de este producto</h3>
            <p>Comparte tu opinión con otros clientes</p>
          </div>
            {{-- formulario --}}
            <form 
              action="{{ route('products.rate', ['productId' => $product->id]) }}" 
              method="POST"
              style="margin-top: 8px;"
            >
              @csrf
              <div class="form-floating">
                <select 
                  name="rating"
                  class="form-select form-select-lg mb-3" 
                  id="floatingSelect" 
                  aria-label="Floating label select example"
                >
                  <option value="1" style="color: orange;">★</option>
                  <option value="2" style="color: orange;">★★</option>
                  <option value="3" style="color: orange;">★★★</option>
                  <option value="4" style="color: orange;">★★★★</option>
                  <option value="5" style="color: orange;" selected>★★★★★</option>
                </select>
                <label for="floatingSelect">Califica</label>
              </div>
            
              <div class="form-floating mb-3">
                <textarea 
                  class="form-control" 
                  name="comment"
                  placeholder="Escribe tu comentario aquí"
                  id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Comentario</label>
              </div>
            
              <button 
                type="submit"
                class="btn btn-primary mb-3"
              >Calificar</button>
            </form>
          @endauth

          <h4>Opiniones de clientes</h4>

          {{-- Lista de comentarios --}}
          <div class="">
            @forelse ($product_rating as $item)

              @if ($item->product_id == $product->id)
              
              <div class="container border rounded-2 mt-2">
                {{-- User --}}
                <div class="user">
                  <i class="fa-solid fa-circle-user"></i><span>{{ $item->user->profile->full_name() }}</span>
                </div>
                
                {{-- Rating --}}
                <div class="start_rating">
                  {{ $item->rating}}
                @for ($i = 1; $i <= 5; $i++)
                  @if ($item->rating >= $i)
                    <span class="fa fa-star checked"></span>
                  @else
                    <span class="fa fa-star"></span>
                  @endif
                @endfor
                </div>

                <div class="comment">
                  <p>{{ $item->comment }}</p>
                </div>

              </div>

              @endif

            @empty

            @endforelse
          </div>
        </section>
      </article>
    </section>
    @include('page.partials.display_whatsapp')
  </main>

@include('templates.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Agrega un evento de clic al botón
        $('#submitButton').click(function (e) {
            e.preventDefault(); // Evita que el formulario se envíe automáticamente

            // Realiza la solicitud Ajax al controlador
            $.ajax({
                url: '{{ route('interested-clients.store') }}',
                type: 'POST',
                data: $('form').serialize(), // Serializa los datos del formulario
                success: function (response) {
                    // Verifica si la respuesta contiene la URL del catálogo
                    if (response.url) {
                        // Crea un enlace oculto y simula un clic para iniciar la descarga
                        var hiddenLink = document.createElement('a');
                        hiddenLink.href = response.url;
                        hiddenLink.download = 'ficha tecnica.pdf';
                        document.body.appendChild(hiddenLink);
                        hiddenLink.click();
                        document.body.removeChild(hiddenLink);
                        alert(response.message || 'El formulario se envió correctamente.');
                    } else {
                        // Muestra un mensaje de éxito o error según la respuesta
                        alert('El formulario se envió correctamente.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr, status, error);
                }
            });
        });
    });
</script>
@endsection