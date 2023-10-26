@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
  <div class="header_container">
    <h1 class="text">Ordenes de usuarios</h1>
    {{-- <button id="buttonModal" class="btn btn-primary">Crear</button> --}}
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre de usuario</th>
        <th>Estado</th>
        <th>Precio Total</th>
        <th>Fecha de creacion</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($orders as $order)
      <tr class="">
        <td>{{ $order->id }}</td>
        <td>{{ '@'.$order->user->name }}</td>
        <td>{{ $order->status->name }}</td>
        <td><b>{{ $order->price_total }}$</b></td>
        <td>{{ $order->created_at }}</td>
        <td>
          <a href="#" class="edit">Ver</a>
          <form action="" method="POST">
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

    </tbody>
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