
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productos Occidente - Olvido su contraseña</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    body{
      background-color: rgb(243 244 246 / 1);
    }
  </style>
</head>
<body>

  <main class="container d-flex align-items-center" style="height: 100vh;">
    <div class="pt-4 d-flex flex-column align-items-center mx-auto my-auto" style="max-width: 500px;" >
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-75">

      <form method="POST" action="{{ route('password.email') }}" class="form-control p-4">
        @csrf
        
        <p class="fs-6">¿Olvidaste tu contraseña? No hay problema. Solo háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir uno nuevo.</p>
        
        <!-- email -->
        <div class="form-group mb-3">
          <label for="correo_electronico">Correo electronico</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="correo_electronico" value="{{old('email')}}" required>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        @if (session('status'))
        <p class="text-success"> {{session('status')}} </p>
        @endif

        <div class="pt-4 d-flex flex-row justify-content-end align-items-center" style="gap: 20px">
          <button type="submit" class="btn btn-secondary">Iniciar sesion</button>
        </div>
      </form>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
