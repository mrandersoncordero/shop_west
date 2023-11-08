<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productos Occidente - Iniciar sesion</title>

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

      <form method="POST" action="{{ route('password.store') }}" class="form-control p-4">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div class="form-group mb-3">
          <label for="correo_electronico">Correo electronico</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="correo_electronico" value="{{ old('email', $request->email) }}" required>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <!-- password -->
        <div class="form-group mb-3">
          <label for="contraseña">Contraseña</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="contraseña" required>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <!-- password_confirmation -->
        <div class="form-group">
          <label for="password_confirmation">Confirmar contraseña</label>
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" required>
          @error('password_confirmation')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="pt-4 d-flex flex-row justify-content-end align-items-center" style="gap: 20px">
          <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
          <button type="submit" class="btn btn-secondary">Iniciar sesion</button>
        </div>
        
      </form>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>