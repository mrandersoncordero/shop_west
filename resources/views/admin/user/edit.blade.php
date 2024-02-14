@extends('templates.dashboard')

@section('head_content')
<title>Panel de Control</title>

@endsection

@section('content_primary')

  <div class="header_container">
    <h1 class="text">Editar CAtegoria "{{ $user->name }}"</h1>
    <div class="dropdown">
      @if (Auth::user()->role->id == 1)
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Permisos de usuario
      </button>
      <form action="{{ route('user.addPermission') }}" method="post" class="dropdown-menu p-2 from-permissions" style="width: 250px">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        @foreach ($permissions as $permission)
        <div class="form-check form-switch">
          @php
            $isChecked = $user_permissions->contains('permission_id', $permission->id);
          @endphp
          <input class="form-check-input" type="checkbox" role="switch" name="permissions[]" value="{{ $permission->id }}" {{ $isChecked ? 'checked' : '' }}>
          <label class="form-check-label" style="font-size: 1rem">{{ $permission->name }}</label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-sm btn-primary" style="width 100%">Guardar</button>
      </form>
      @endif
    </div>
  </div>
  <form action="{{ route('users.update', $user) }}" method="post">

    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('first_name') is-invalid @enderror " name="first_name" value="{{ old('first_name', $user->profile->first_name)}}">
      <label for="floatingInput">Nombre</label>
      @error('first_name')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('last_name') is-invalid @enderror " name="last_name" value="{{ old('last_name', $user->profile->last_name)}}">
      <label for="floatingInput">Apellido</label>
      @error('last_name')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('dni') is-invalid @enderror " name="dni" value="{{ old('dni', $user->profile->dni )}}">
      <label for="floatingInput">CI o RIF</label>
      @error('dni')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
      @enderror
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('address') is-invalid @enderror " name="address" value="{{ old('address', $user->profile->address)}}">
      <label for="floatingInput">Direccion</label>
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>
    
    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('phone_number') is-invalid @enderror " name="phone_number" value="{{ old('phone_number', $user->profile->phone_number)}}">
      <label for="floatingInput">Numero de telefono</label>
      @error('phone_number')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>
    
    <div class="form-floating mb-3">
      <input type="date" class="form-control @error('birthday_date') is-invalid @enderror " name="birthday_date" value="{{ old('birthday_date', $user->profile->birthday_date)}}">
      <label for="floatingInput">Fecha de nacimiento</label>
      @error('birthday_date')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>

    <div class="form-floating mb-3">
      <select class="form-select @error('withholding_tax') is-invalid @enderror" name="withholding_tax">
        @if ($user->profile->withholding_tax == 0.0 || null)
        <option value="0.0" selected>0%</option>
        <option value="0.75">75%</option>
        <option value="100">100%</option>
        @elseif($user->profile->withholding_tax == 0.75)
        <option value="0.0">0%</option>
        <option value="0.75" selected>75%</option>
        <option value="100">100%</option>
        @else
        <option value="0.0">0%</option>
        <option value="0.75">75%</option>
        <option value="100" selected>100%</option>
        @endif
      </select>
      <label for="Subcategory">Retencion de IVA</label>
      @error('withholding_tax')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
      @enderror
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name', $user->name)}}">
      <label for="floatingInput">Nombre de usuario</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>
    
    <div class="form-floating mb-3">
      <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email', $user->email)}}">
      <label for="floatingInput">Correo electronico</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
    @enderror
    </div>
    
    <div class="form-floating mb-3">
      <select class="form-select @error('role') is-invalid @enderror" name="role_id">
        @foreach ($roles as $role)
          @if ($user->role->id == $role->id)
          <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
          @else
          <option value="{{ $role->id }}">{{ $role->name }}</option>
          @endif
        @endforeach
      </select>
      <label for="Subcategory">Tipo de usuario</label>
      @error('role')
      <div class="invalid-feedback">
        {{ $message }}
      </div> 
      @enderror
    </div>

    <div style="display: flex; align-items: center; margin-top: 10px;">
      <input type="submit" value="Enviar" class="btn btn-primary">
    </div>
  </form>
  
@endsection