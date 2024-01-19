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
                <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" 
                    placeholder="name@example.com"
                    name="email"
                >
                <label for="email">Correo electronico</label>
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
                <label for="phone_number">Numero de telefono</label>
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