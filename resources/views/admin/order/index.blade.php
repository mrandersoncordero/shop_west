@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
<div class="home_content">
  <div class="header_container">
    <h1 class="text">Ordenes de usuarios</h1>
    {{-- <button id="buttonModal" class="btn btn-primary">Crear</button> --}}
  </div>
  <table class="table table-hover table-bordered" id="table_order">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre de usuario</th>
        <th>Estado</th>
        <th>Tipo de pago</th>
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
        <td>{{ $order->payment_type->name }}</td>
        <td><b>{{ $order->price_total }}$</b></td>
        <td>{{ $order->created_at }}</td>
        <td>
          <div class="dropdown">
              <a class="btn " href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('icons/elipsis.svg')}}" alt="">
              </a>

              <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('orders.edit', $order)}}" class="dropdown-item">Editar</a></li>
                <li>
                  <form action="" method="POST">
                      @csrf
                      @method('DELETE')
                      <input 
                          type="submit" 
                          value="Eliminar" 
                          class="dropdown-item"
                          onclick="return confirm('Desea Eliminar?')"
                      >
                  </form>
                  <form action="{{ route('orders.change_status_order', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="1" name="status_id">
                      <input 
                          type="submit" 
                          value="Aprobar" 
                          class="dropdown-item"
                          onclick="return confirm('Desea cambair el estado de la orden a aprobado?')"
                      >
                  </form>
                  <form action="{{ route('orders.change_status_order', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="3" name="status_id">
                      <input 
                          type="submit" 
                          value="Rechazar" 
                          class="dropdown-item"
                          onclick="return confirm('Desea cambair el estado de la orden a rechazado?')"
                      >
                  </form>
                </li>
              </ul>
          </div>
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

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script>
    let table_order = new DataTable("#table_order", {
      responsive: true,
      columnDefs: [
          { targets: [0, 1, 2, 3, 4, 5], searchable: true }
      ]
    });
  </script>
@endsection