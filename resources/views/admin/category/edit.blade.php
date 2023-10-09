@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Edit category "{{ $category->name }}"</h1>
    </div>
    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            <label for="floatingInput">Name</label>
        </div>
        
        <div class="form-floating">
            <textarea class="form-control" name="description" rows="5">{{ $category->description }}</textarea>
            <label for="floatingTextarea">Description</label>
        </div>

        <div style="display: flex; align-items: center; margin-top: 10px;">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
</div>   
@endsection