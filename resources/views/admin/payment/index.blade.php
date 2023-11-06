@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
<div class="home_content">
  <div class="header_container">
    <h1 class="text">Pagos de usuario</h1>
    {{-- <button id="buttonModal" class="btn btn-primary">Crear</button> --}}
  </div>
  <table class="table table-hover table-bordered" id="table_payment">
    <thead>
      <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Nº de Pedido</th>
        <th>Referencia bancaria</th>
        <th>Comprobante de pago</th>
        <th>Fecha de creacion</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($payments as $payment)
      <tr class="">
        <td>{{ $payment->id }}</td>
        <td>{{ '@'.$payment->order->user->name }}</td>
        <td>
          <a href="{{ route('orders.edit', $payment->order->id) }}">{{ $payment->order->id }}</a>
        </td>
        <td>{{ $payment->bank_reference }}</td>
        <td><a href="{{ asset("proof_of_payment/{$payment->file}") }}">{{ $payment->file }}</a></td>
        <td>{{ $payment->created_at }}</td>

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
    let table_payment = new DataTable("#table_payment", {
      responsive: true,
      columnDefs: [
          { targets: [0, 1, 2, 3, 4, 5], searchable: true }
      ]
    });
  </script>
@endsection