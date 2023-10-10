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
  <textarea class="form-control @error('description') is-invalid @enderror " name="description" rows="5">{{ old('description','')}}</textarea>
  <label for="floatingTextarea">Description</label>
  @error('description')
  <div class="invalid-feedback">
    {{ $message }}
  </div> 
  @enderror
</div>
<div class="form-floating">
  <select class="form-select" id="floatingSelect" name="category_id">
    <option selected></option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <label for="floatingSelect">Category</label>
</div>

<div style="display: flex; align-items: center; margin-top: 10px;">
  <input type="submit" value="Enviar" class="btn btn-primary">
</div>