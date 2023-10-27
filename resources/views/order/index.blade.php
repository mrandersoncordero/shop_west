@extends('template')

@section('head_content')
<title>Pegoccidente - My orders</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection

@section('content')
<main style="margin-top: 100px; height: 100%">
  <header class="header_line" style="margin: 24px 0;">
    <h1>Mis pedidos</h1>
  </header>
  <table id="myTable" class="display">
    <thead>
      <tr>
        <th>#</th>
        <th>Estado</th>
        <th>Precio Total</th>
        <th>Fecha de creacion</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders_by_user as $key => $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->status->name }}</td>
        <td><b>{{ $order->price_total }}$</b></td>
        <td>{{ $order->created_at }}</td>
        <td><button>actions</button> <button>ver</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>

</main>

@include('templates.footer')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script type="module" src="{{ asset('js/tables_.js') }}"></script>
@endsection