@extends('template')

@section('head_content')
<title>Pegoccidente - Shop</title>
<link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@endsection

@section('content')
  
<main>
    <header class="header_line"  style="margin-bottom: 24px">
        <h1>CONTACTANOS</h1>
    </header>

    <aside class="menu_contact">
        <div>
            <a href="#">
                <i class="fa-brands fa-whatsapp"></i>
                <p>Envianos un Whatsapp</p>
                <p>+58 909 890 89 32</p>
            </a>
            <a href="mailto:correo_ejemplo@example.com">
                <i class="fa-solid fa-envelope"></i>
                <p>Envianos un correo</p>
                <p>correo_ejemplo@example.com</p>
            </a>
        </div>
    </aside>
    <section>
        <form class="container">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name_complete" placeholder="joe">
                <label for="name_complete">Nombre completo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="correo" placeholder="name@example.com">
                <label for="correo">Correo electronico</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phone_number" placeholder="name@example.com">
                <label for="phone_number">Numero de telefono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="subject" placeholder="joe">
                <label for="subject">Asunto</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" row="4" id="comment"></textarea>
                <label for="comment">Comentario</label>
            </div>

            <button type="button" class="btn btn-primary mt-4">Enviar</button>
        </form>
    </section>
</main>

@include('templates.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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