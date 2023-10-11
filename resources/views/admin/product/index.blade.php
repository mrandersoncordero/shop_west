@extends('templates.dashboard')

@section('head_content')
<title>Dashboard - Products</title>
@endsection

@section('content')
<div class="home_content">
    <div class="header_container">
        <h1 class="text">Products</h1>
        <button id="buttonModal" class="btn btn-primary">Crear</button>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Weight</th>
              <th scope="col">Format</th>
              <th scope="col">Yield</th>
              <th scope="col">Traffic</th>
              <th scope="col">Price</th>
              <th scope="col">Image</th>
              <th scope="col">Created_at</th>
              <th scope="col">Actions</th>
            </tr>
        </thead>
    @forelse ($products as $product)
        <tr class="">
            <td class="">{{ $product->id }}</td>
            <td class="">{{ $product->code }}</td>
            <td class="">{{ $product->name }}</td>
            <td class="">{{ $product->weight }}</td>
            <td class="">{{ $product->format }}</td>
            <td class="">{{ $product->yield }}</td>
            <td class="">{{ $product->traffic }}</td>
            <td class="">{{ $product->price }}</td>
            <td class=""><a href="{{ asset("product/$product->image" )}}">{{ $product->image }}</a></td>
            <td class="">{{ $product->created_at }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="edit">Editar</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST">
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

<div id="modal" class="modal-container" @if($errors->has('name') || $errors->has('description') || $errors->has('code') || $errors->has('weight') || $errors->has('format') || $errors->has('yield') || $errors->has('traffic') || $errors->has('price') || $errors->has('image')) style="visibility: visible;" @endif>
    <div class="modal_content">
        <div class="modal_header">
            <div>
                <p>Create product</p>
                <i class='bx bx-x' id="close"></i>
            </div>
        </div>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="mt-4">
            @include('admin.product._form')
        </form>
    </div>
</div>    
@endsection