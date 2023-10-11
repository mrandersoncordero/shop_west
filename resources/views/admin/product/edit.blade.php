@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Edit product "{{ $product->name }}"</h1>
    </div>
    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name)}}">
          <label for="floatingInput">Name</label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="form-floating mb-3">
          <textarea class="form-control @error('description') is-invalid @enderror " name="description" rows="5">{{ old('description', $product->description)}}</textarea>
          <label for="floatingTextarea">Description</label>
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
          <label for="Subcategory">Subcategory</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('code') is-invalid @enderror " name="code" value="{{ old('code', $product->code)}}">
          <label for="floatingInput">Code</label>
          @error('code')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="number" class="form-control @error('weight') is-invalid @enderror " name="weight" value="{{ old('weight', $product->weight)}}">
          <label for="floatingInput">Weight</label>
          @error('weight')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('format') is-invalid @enderror " name="format" value="{{ old('format', $product->format)}}">
          <label for="floatingInput">Format</label>
          @error('format')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('yield') is-invalid @enderror " name="yield" value="{{ old('yield', $product->yield)}}">
          <label for="floatingInput">Yield</label>
          @error('yield')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('traffic') is-invalid @enderror " name="traffic" value="{{ old('traffic', $product->traffic)}}">
          <label for="floatingInput">Traffic</label>
          @error('traffic')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <input type="number" class="form-control @error('price') is-invalid @enderror " name="price" value="{{ old('price', $product->price)}}">
          <label for="floatingInput">Price</label>
          @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>
        
        <div class="input-group mb-3">
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
          <label class="input-group-text" for="image">Upload</label>
          @error('image')
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