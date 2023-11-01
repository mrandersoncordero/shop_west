@csrf
<div class="form-floating mb-3">
  <input type="text" class="form-control @error('first_name') is-invalid @enderror " name="first_name" value="{{ old('first_name','')}}">
  <label for="floatingInput">Nombre</label>
  @error('first_name')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('last_name') is-invalid @enderror " name="last_name" value="{{ old('last_name','')}}">
  <label for="floatingInput">Apellido</label>
  @error('last_name')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('dni') is-invalid @enderror " name="dni" value="{{ old('dni','')}}">
  <label for="floatingInput">Documento de identidad</label>
  @error('dni')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('address') is-invalid @enderror " name="address" value="{{ old('address','')}}">
  <label for="floatingInput">Direccion</label>
  @error('address')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('phone_number') is-invalid @enderror " name="phone_number" value="{{ old('phone_number','')}}">
  <label for="floatingInput">Numero de telefono</label>
  @error('phone_number')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <select name="withholding_tax" class="form-select @error('withholding_tax') is-invalid @enderror">
    <option value="0.0" selected>0%</option>
    <option value="0.75">75%</option>
    <option value="100">100%</option>
  </select>
  <label for="Subcategory">Retencion de IVA</label>
  @error('withholding_tax')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="date" class="form-control @error('birthday_date') is-invalid @enderror " name="birthday_date" value="{{ old('birthday_date','')}}">
  <label for="floatingInput">Fecha de nacimiento</label>
  @error('birthday_date')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name','')}}">
  <label for="floatingInput">Nombre de usuario</label>
  @error('name')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email','')}}">
  <label for="floatingInput">Correo electronico</label>
  @error('email')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('password') is-invalid @enderror " name="password" value="{{ old('password','')}}">
  <label for="floatingInput">Contraseña</label>
  @error('password')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation', '') }}">
  <label for="floatingInput">Confirmar Contraseña</label>
  @error('password_confirmation')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>

<div class="form-floating mb-3">
  <select name="role" class="form-select @error('role') is-invalid @enderror">
    <option value="client">Cliente</option>
    <option value="admin">Admin</option>
  </select>
  <label for="Subcategory">Tipo de usuario</label>
  @error('role')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div style="display: flex; align-items: center; margin-top: 10px;">
  <input type="submit" value="Crear" class="btn btn-primary">
</div>