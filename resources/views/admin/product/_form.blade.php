@csrf

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name','')}}">
  <label for="floatingInput">Name</label>
  @error('name')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <textarea class="form-control @error('description') is-invalid @enderror " name="description" rows="5">{{ old('description', '')}}</textarea>
  <label for="floatingTextarea">Description</label>
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
  <label for="Subcategory">Subcategory</label>
  @error('subcategory_id')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('code') is-invalid @enderror " name="code" value="{{ old('code','')}}">
  <label for="floatingInput">Code</label>
  @error('code')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control @error('weight') is-invalid @enderror " name="weight" value="{{ old('weight','')}}">
  <label for="floatingInput">Weight</label>
  @error('weight')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('format') is-invalid @enderror " name="format" value="{{ old('format','')}}">
  <label for="floatingInput">Format</label>
  @error('format')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('yield') is-invalid @enderror " name="yield" value="{{ old('yield','')}}">
  <label for="floatingInput">Yield</label>
  @error('yield')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control @error('traffic') is-invalid @enderror " name="traffic" value="{{ old('traffic','')}}">
  <label for="floatingInput">Traffic</label>
  @error('traffic')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control @error('price') is-invalid @enderror " name="price" value="{{ old('price','')}}">
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

<div style="display: flex; align-items: center; margin-top: 10px;">
  <input type="submit" value="Enviar" class="btn btn-primary">
</div>