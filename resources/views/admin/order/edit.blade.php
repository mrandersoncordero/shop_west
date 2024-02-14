@extends('templates.dashboard')

@section('head_content')
<title>Panel de Control</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content_primary')

  <div class="header_container">
    <h1 class="text">Orden <b>#{{ $order->id }}</b></h1>
  </div>

  <section class="container_product_buy_client">

    <article class="info_user">
      {{-- Informacion del usuario --}}
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floating_username" value="{{ $order->user->profile->full_name() }}" disabled>
        <label for="floating_username">Nombre de usuario</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floating_dni" value="{{ $order->user->profile->dni }}" disabled>
        <label for="floating_dni">CI o RIF</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="description" rows="5" id="floating_address" disabled>{{ $order->user->profile->address }}</textarea>
        <label for="floating_address">Direccion</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floating_phone_number" value="{{ $order->user->profile->phone_number }}" disabled>
        <label for="floating_phone_number">Numero de Telefono</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floating_withholding_tax" value="{{ $order->user->profile->withholding_tax }}" disabled>
        <label for="floating_withholding_tax">Retencion de IVA</label>
      </div>
    </article>

    <article class="data_order_buy">
      <table id="table_detail_order" class="display table table-bordered">
        <thead>
          <tr>
            <th>#code</th>
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($order->order_products as $item)
        <tr>
          <th>{{ $item->product->code }}</th>
          <th>{{ $item->product->name }}</th>
          <th>{{ $item->quantity }}</th>
          <th>{{ $item->product->price }}$</th>
        </tr>
        @endforeach
        </tbody>
      </table>

      <table id="table_detail_order" class="display table table-bordered mt-4">
        <thead>
          <tr>
            <th>Total Pedido</th>
            <th>{{ $order->price_total }}$</th>
          </tr>
        </thead>
        <tbody>
          @php
          $subtotal = $order->price_total;
          $iva = ($order->price_total * 0.16);

          $subtotal_with_iva = $subtotal + $iva;
          
          if ($order->payment_type_id == 2) {
            /**
            * si el tipo de pago es en divisas en efectivo 
            * hacer operaciones con IGTF
            */
            $igtf = ($subtotal_with_iva * 0.03);

            if($order->user->profile->withholding_tax == 100) {
              $total_price = $subtotal_with_iva + $igtf - $iva;
            }else{
              $withholding_tax = $iva * $order->user->profile->withholding_tax;
              $total_price = $subtotal_with_iva + $igtf - $withholding_tax;
            }

          }else{
            
            if($order->user->profile->withholding_tax == 100) {
              $total_price = $subtotal_with_iva - $iva;
            }else{
              $withholding_tax = $iva * $order->user->profile->withholding_tax;
              $total_price = $subtotal_with_iva - $withholding_tax;
            }
          }

          // Formatea las variables para limitar a 2 decimales
          if ($order->payment_type_id == 2) {
            $igtf = number_format($igtf, 2);
          }
          $iva = number_format($iva, 2);
          $total_price = number_format($total_price, 2);
          @endphp
          <tr>
            <td>IVA</td>
            <th>{{ $iva }}$</th>
          </tr>
          @if ($order->payment_type_id == 2)
          <tr>
            <td>IGTF</td>
            <th>{{ $igtf }}$</th>
          </tr>    
          @endif
          <tr>
            <th>Total a pagar</th>
            <th>
            {{ $total_price }}$
            </th>
          </tr>
        </tbody>
      </table>
    </article>
  </section>
  
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
  let table_detail_order = new DataTable("#table_detail_order", {
    paging: false,
    responsive: true,
    info: false,
    columnDefs: [
        { targets: [0, 1, 2, 3], searchable: true }
    ]
  });
</script>
@endsection