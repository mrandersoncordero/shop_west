@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Edit subcategory "{{ $subcategory->name }}"</h1>
    </div>
    <form action="{{ route('subcategories.update', $subcategory) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" value="{{ old('name', $subcategory->name)}}">
            <label for="floatingInput">Name</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div> 
            @enderror
        </div>
        
        <div class="form-floating mb-3">
          <textarea class="form-control @error('description') is-invalid @enderror " name="description" rows="5">{{ old('description',$subcategory->description)}}</textarea>
          <label for="floatingTextarea">Description</label>
          @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
          @enderror
        </div>

        <div class="form-floating mb-3">
          <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" @if ($category->id == $subcategory->id) @selected(true) @endif>{{ $category->name }}</option>
            @endforeach
          </select>
          <label>Category</label>
        </div>

        <div style="display: flex; align-items: center;">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
</div>   
@endsection