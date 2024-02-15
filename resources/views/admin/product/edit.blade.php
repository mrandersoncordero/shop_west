@extends('templates.dashboard')

@section('head_content')
<title>Panel de Control</title>
@endsection

@section('content_primary')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Editar producto "{{ $product->name }}"</h1>
    </div>
    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name)}}">
          <label for="floatingInput">Nombre</label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="form-floating mb-3">
          <textarea class="form-control @error('description') is-invalid @enderror " name="description" rows="5">{{ old('description', $product->description)}}</textarea>
          <label for="floatingTextarea">Descripcion</label>
          @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" id="Subcategory" name="subcategory_id">
            <option selected></option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" @if ($subcategory->id == $product->subcategory_id) @selected(true) @endif>{{ $subcategory->name }}</option>
            @endforeach
          </select>
          <label for="Subcategory">Subcategoria</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('code') is-invalid @enderror " name="code" value="{{ old('code', $product->code)}}">
          <label for="floatingInput">Codigo</label>
          @error('code')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="number" class="form-control @error('weight') is-invalid @enderror " name="weight" value="{{ old('weight', $product->weight)}}">
          <label for="floatingInput">Peso</label>
          @error('weight')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('format') is-invalid @enderror " name="format" value="{{ old('format', $product->format)}}">
          <label for="floatingInput">Formato</label>
          @error('format')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('yield') is-invalid @enderror " name="yield" value="{{ old('yield', $product->yield)}}">
          <label for="floatingInput">Rendimiento</label>
          @error('yield')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('traffic') is-invalid @enderror " name="traffic" value="{{ old('traffic', $product->traffic)}}">
          <label for="floatingInput">Trafico</label>
          @error('traffic')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="form-floating mb-3">
          <select class="form-select @error('type_of_sale') is-invalid @enderror" id="Type_of_sale" name="type_of_sale" value="{{ old('type_of_sale', $product->type_of_sale)}}">
            <option value="Paleta" @if ($product->type_of_sale == 'Paleta') selected @endif>Paleta</option>
            <option value="Caja" @if ($product->type_of_sale == 'Caja') selected @endif>Caja</option>
          </select>
          <label for="Type_of_sale">Tipo de venta</label>
          @error('type_of_sale')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="number" class="form-control @error('quantity') is-invalid @enderror " name="quantity" value="{{ old('quantity', $product->quantity ) }}">
          <label>Cantidad para la venta</label>
          @error('quantity')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="form-floating mb-3">
          <input type="number" class="form-control @error('price') is-invalid @enderror " name="price" value="{{ old('price', $product->price)}}">
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
        
        <div style="display: flex; align-items: center;">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
</div>   
@endsection