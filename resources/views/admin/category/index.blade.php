@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Categories and subcategories</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">description</th>
              <th scope="col">Actions</th>
            </tr>
        </thead>
    @forelse ($categories as $category)
        <tr class="">
            <td class="">{{ $category->name }}</td>
            <td class="">{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="edit">Editar</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <input 
                    type="submit" 
                    value="Eliminar" 
                    class=""
                    onclick="return confirm('Desea Eliminar?')"
                >
                </form>
            </td>
        </tr>
    @empty
        <div class="p-6 text-gray-900">
            {{ __("Sin datos") }}
        </div>
    @endforelse
  </table>


</div>
<div id="modal" class="modal-container" @if($errors->has('name') || $errors->has('description')) style="visibility: visible;" @endif>
    <div class="modal_content">
        <div class="modal_header">
            <div>
                <p>Crear categoria</p>
                <i class='bx bx-x' id="close"></i>
            </div>
        </div>
        <form action="{{ route('categories.store') }}" method="post" class="mt-4">
            @include('admin.category._form')
        </form>
    </div>
</div>    
@endsection