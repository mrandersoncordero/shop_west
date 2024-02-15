@csrf

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name','')}}">
  <label for="floatingInput">Nombre</label>
  @error('name')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <textarea class="form-control @error('description') is-invalid @enderror " name="description" rows="5">{{ old('description', '')}}</textarea>
  <label for="floatingTextarea">Descripcion</label>
  @error('description')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <select class="form-select @error('subcategory_id') is-invalid @enderror" id="Subcategory" name="subcategory_id">
    <option selected></option>
    @foreach ($subcategories as $subcategory)
        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
    @endforeach
  </select>
  <label for="Subcategory">Subcategoria</label>
  @error('subcategory_id')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('code') is-invalid @enderror " name="code" value="{{ old('code','')}}">
  <label for="floatingInput">Codigo</label>
  @error('code')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control @error('weight') is-invalid @enderror " name="weight" value="{{ old('weight','')}}">
  <label for="floatingInput">Peso</label>
  @error('weight')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('format') is-invalid @enderror " name="format" value="{{ old('format','')}}">
  <label for="floatingInput">Formato</label>
  @error('format')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('yield') is-invalid @enderror " name="yield" value="{{ old('yield','')}}">
  <label for="floatingInput">Rendimiento</label>
  @error('yield')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('traffic') is-invalid @enderror " name="traffic" value="{{ old('traffic','')}}">
  <label for="floatingInput">Trafico</label>
  @error('traffic')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <select class="form-select @error('type_of_sale') is-invalid @enderror" id="Type_of_sale" name="type_of_sale">
    <option selected></option>
    <option value="Paleta">Paleta</option>
    <option value="Caja">Caja</option>
  </select>
  <label for="Type_of_sale">Tipo de venta</label>
  @error('type_of_sale')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control @error('quantity') is-invalid @enderror " name="quantity" value="{{ old('quantity','')}}">
  <label>Cantidad para la venta</label>
  @error('quantity')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control @error('price') is-invalid @enderror " name="price" value="{{ old('price','')}}">
  <label for="floatingInput">Precio</label>
  @error('price')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="input-group mb-3">
  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
  <label class="input-group-text" for="image">Subir imagen</label>
  @error('image')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="input-group mb-3">
  <input type="file" class="form-control @error('palette_color') is-invalid @enderror" id="palette_color" name="palette_color">
  <label class="input-group-text" for="palette_color">Subir paleta de colores</label>
  @error('palette_color')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div style="display: flex; align-items: center; margin-top: 10px;">
  <input type="submit" value="Enviar" class="btn btn-primary">
</div>