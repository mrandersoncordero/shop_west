@extends('template')

@section('head_content')
<title>Pegoccidente - My orders</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection

@section('content')
<main style="display: flex; flex-direction: column; min-height: 100vh;">
  <header class="header_line" style="margin: 24px 0;">
    <h1>Mis pedidos</h1>
  </header>
  <div class="table-responsive">
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Estado</th>
          <th>Fecha de creacion</th>
          <th>Metodo de pago</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders_by_user as $key => $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>
            <p class="bart_status_order
            @if ($order->status->id == 1)
            approved
            @elseif($order->status->id == 2)
            in_process
            @else
            rejected
            @endif
            ">
              <span>{{ $order->status->name }}</span>
            </p>
          </td>
          <td>{{ $order->created_at }}</td>
          <td>{{ $order->payment_type->name }}</td>
          <td>
            <a href="{{ route('order.edit', $order->id) }}"><i class="fa-solid fa-eye"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</main>

@include('templates.footer')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script type="module" src="{{ asset('js/tables_.js') }}"></script>
@endsection