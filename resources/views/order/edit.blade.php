@extends('template')

@section('head_content')
<title>Pegoccidente - My orders</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endsection

@section('content')
<main style="margin-top: 100px; height: 90vh">
  <header class="header_line" style="margin: 24px 0;">
    <h1>Pedido #{{ $order->id }}</h1>
  </header>

  <section class="container_order_buy">
    <article class="data_user">
      <p>
        <b>Nombre o razon social:</b> {{ $order->user->profile->first_name }}
      </p>
      <p>
        <b>DNI:</b> {{ $order->user->profile->dni}}
      </p>
      <p>
        <b>Direccion:</b> {{ $order->user->profile->address }}
      </p>
      <p>
        <b>Telefono:</b> {{ $order->user->profile->phone_number}}
      </p>
      <p>
        <b>Correo electronico:</b> {{ $order->user->email }}
      </p>
    </article>
    <article class="data_order_product">
      <table id="table_detail_order" class="display table table-bordered">
        <thead>
          <tr>
            <th>#COD</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->order_products as $item)
          <tr>
            <td>{{ $item->product->code }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price }}$</td>
            <td>
            @php
              $quantity = $item->product->price * $item->quantity
            @endphp
            {{ $quantity }}$
            </td>
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
          $iva = number_format($iva, 2);
          $igtf = number_format($igtf, 2);
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

</main>

@include('templates.footer')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script type="module" src="{{ asset('js/tables_.js') }}"></script>
@endsection