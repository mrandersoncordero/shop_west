@extends('template')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

<main>
    @if (session('message'))
    @include('templates.message')
    @endif
    <div class="banner">
        <img src="{{ asset('images/banners/banner_pego.png') }}" style="margin:0px;" class="banner_image">
    </div>

    <header class="header_line"  style="margin-bottom: 24px">
        <h1>CONTACTANOS</h1>
    </header>

    <aside class="menu_contact">
        <div>
            <a href="https://wa.me/+584145769904" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
                <p>Planta Barquisimeto</p>
                <p>+58 414-5769904</p>
            </a>
            <a href="https://wa.me/+584165790964" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
                <p>Planta Trujillo</p>
                <p>+58 416-5790964</p>
            </a>
            <a href="mailto:ventasnib@pegoccidente.com">
                <i class="fa-solid fa-envelope"></i>
                <p>Envianos un correo</p>
                <p>ventasnib@pegoccidente.com</p>
            </a>
        </div>
    </aside>
    <section>
        <form action="{{ route('send.email') }}" method="POST" class="container">
            @csrf
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('complete_name') is-invalid @enderror"
                    id="name_complete"
                    placeholder="joe"
                    name="complete_name"
                >
                <label for="name_complete">Nombre completo</label>
                @error('complete_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select @error('zone') is-invalid @enderror" id="zona" name="zone">
                    <option selected></option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Anzoátegui">Anzoátegui</option>
                    <option value="Apure">Apure</option>
                    <option value="Aragua">Aragua</option>
                    <option value="Barinas">Barinas</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Carabobo">Carabobo</option>
                    <option value="Cojedes">Cojedes</option>
                    <option value="Delta Amacuro">Delta Amacuro</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Falcón">Falcón</option>
                    <option value="Lara">Lara</option>
                    <option value="Mérida">Mérida</option>
                    <option value="Miranda">Miranda</option>
                    <option value="Monagas">Monagas</option>
                    <option value="Nueva Esparta">Nueva Esparta</option>
                    <option value="Portuguesa">Portuguesa</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Táchira">Táchira</option>
                    <option value="Trujillo">Trujillo</option>
                    <option value="Vargas">Vargas</option>
                    <option value="Yaracuy">Yaracuy</option>
                    <option value="Zulia">Zulia</option>
                  </select>
                <label for="zona">Zona</label>
                @error('zone')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    placeholder="name@example.com"
                    name="email"
                >
                <label for="email">Correo electrónico</label>
                @error('complete_name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('phone_number') is-invalid @enderror"
                    id="phone_number"
                    placeholder="name@example.com"
                    name="phone_number"
                >
                <label for="phone_number">Número de teléfono</label>
                @error('phone_number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control @error('subject') is-invalid @enderror"
                    id="subject"
                    placeholder="joe"
                    name="subject"
                >
                <label for="subject">Asunto</label>
                @error('subject')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <textarea
                    class="form-control @error('comment') is-invalid @enderror"
                    placeholder="Leave a comment here"
                    row="4"
                    id="comment"
                    name="comment"
                ></textarea>
                <label for="comment">Comentario</label>
                @error('comment')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-4">Enviar</button>
        </form>
    </section>
    @include('page.partials.display_whatsapp')
</main>

@include('templates.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="{{ asset('js/productos_destacados.js') }}"></script>
<script src="{{ asset('js/glide.min.js') }}"></script>
<script src="{{ asset('js/display_whatsapp.js') }}"></script>
<script>
    const config = {
        type: 'carousel',
        perView: 1,
    };
    new Glide('.glide', config).mount()
</script>

@endsection
