@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
  <div class="header_container">
    <h1 class="text">Pagos de usuario</h1>
    {{-- <button id="buttonModal" class="btn btn-primary">Crear</button> --}}
  </div>
  <table class="table table-hover">
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