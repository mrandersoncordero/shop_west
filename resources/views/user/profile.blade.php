@extends('template')

@section('head_content')
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}"> <!-- Agrega tu archivo de estilos personalizado -->
@endsection

@section('content')
  <main class="profile">
    @if (session('message'))
    @include('templates.message')
    @endif
    <div class="profile-header">
      <header class="header_line">
        <h1>Perfil de Usuario</h1>
      </header>
    </div>

    <section class="profile-container">

      {{-- Informacion del usuario --}}
      <div class="profile-information profile-box ">
        <header>
          <h2>Informacion de Perfil</h2>
          <p>Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.</p>
        </header>

        <div>
          <form action="{{ route('user.update', Auth::user()) }}" method="POST">
            @csrf
            {{-- username --}}
            <div class="mb-3">
              <label for="Username" class="form-label ">Nombre de Usuario</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="Username" name="name" value="{{ old('name', $user->name)}}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            {{-- email --}}
            <div class="mb-3">
              <label for="Email" class="form-label">Correo Electronico</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" name="email" value="{{ old('email', $user->email) }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            {{-- dni --}}
            <div class="mb-3">
              <label for="DNI" class="form-label">Cedula o RIF</label>
              <input type="text" class="form-control @error('dni') is-invalid @enderror" id="DNI" name="dni" value="{{ old('dni', $user->profile->dni) }}">
              @error('dni')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            {{-- first_name --}}
            <div class="mb-3">
              <label for="first_name" class="form-label">Nombre</label>
              <input type="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="Email" value="{{ old('first_name', $user->profile->first_name) }}">
              @error('first_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            {{-- last_name --}}
            <div class="mb-3">
              <label for="last_name" class="form-label">Apellido</label>
              <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $user->profile->last_name) }}">
              @error('last_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            {{-- address --}}
            <div class="mb-3">
              <label for="address" class="form-label">Direccion</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $user->profile->address) }}">
              @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            {{-- phone_number --}}
            <div class="mb-3">
              <label for="phone_number" class="form-label">Numero de telefono</label>
              <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->profile->phone_number) }}">
              @error('phone_number')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            <div class="mb-3">
              {{-- birthday_date --}}
              <label for="birthday_date" class="form-label">Fecha de nacimiento</label>
              <input type="date" class="form-control @error('birthday_date') is-invalid @enderror" id="birthday_date" name="birthday_date" value="{{ old('birthday_date', $user->profile->birthday_date) }}">
              @error('birthday_date')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>

    </section>

    <section class="profile-container">

      {{-- Informacion del usuario --}}
      <div class="profile-information profile-box ">
        <header>
          <h2>Actualizar contraseña</h2>
          <p>Asegurarse de que su cuenta está utilizando una contraseña larga y aleatoria para mantenerse seguro.</p>
        </header>

        <div>
          <form action="{{-- --}}" method="POST">
            @csrf
            {{-- current password --}}
            <div class="mb-3">
              <label for="Current_password" class="form-label">Contraseña actual</label>
              <input type="text" class="form-control" id="Current_password" name="current_password">
              {{-- <div class="invalid-feedback">
                invalid-feedbaack
              </div> --}}
            </div>
            {{-- new password --}}
            <div class="mb-3">
              <label for="New_password" class="form-label">Nueva contraseña</label>
              <input type="text" class="form-control" id="New_password" name="new_password">
            </div>
            {{-- confirm password --}}
            <div class="mb-3">
              <label for="Confirm_password" class="form-label">Confirmar contraseña</label>
              <input type="text" class="form-control" id="Confirm_password" name="confirm_password">
              {{-- <div class="invalid-feedback">
                invalid-feedbaack
              </div> --}}
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>

    </section>
  </main>

    @include('templates.footer')
@endsection
