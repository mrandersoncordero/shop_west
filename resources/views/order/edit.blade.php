@extends('template')

@section('head_content')
<title>Pegoccidente - My orders</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@endsection

@section('content')
<main style="display: flex; flex-direction: column; min-height: 100vh;">
  <header class="header_line" style="margin: 24px 0;">
    <h1>Pedido #{{ $order->id }}</h1>
  </header>

  <section class="container_order_buy">
    <article class="data_user">
      {{-- Informacion del usuario --}}
      <p>
        <b>Nombre o razon social:</b> {{ $order->user->profile->first_name }}
      </p>
      <p>
        <b>CI o RIF:</b> {{ $order->user->profile->dni}}
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

      @if ($order->status->id == 1)

        @if (($order->payment_type_id == 3 || $order->payment_type_id == 4) && $isset_payment->isEmpty() )
          <form action="{{ route('payment.store') }}" method="post" class="container border rounded-2 p-4 mt-4" enctype="multipart/form-data">
            @csrf
            <label for="" class="form-label">Registrar comprobante de pago</label>
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            @error('order_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div> 
            @enderror

            <div class="form-floating mb-3">
              <input type="text" id="floating_bank_reference" class="form-control @error('bank_reference') is-invalid @enderror" name="bank_reference" value="{{ old('bank_reference','')}}">
              <label for="floating_bank_reference">Referencia bancaria</label>
              @error('bank_reference')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Archivo</label>
              <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file">
              @error('file')
              <div class="invalid-feedback">
                {{ $message }}
              </div> 
              @enderror
            </div>
            <input type="submit" value="Enviar">
          </form>
        @else
          <div class="container mt-4">
            <p>El metodo de pago de esta orden de compra es: <b>{{ $order->payment_type->name}}</b></p>
            <p>Estamos comprobando tu pago, uno de nuestros administradores se pondra en contacto contigo al comprobar dicho pago.</p>
            <div>
              @foreach ($isset_payment as $item)
              <p><b>Referencia bancaria:</b> {{$item->bank_reference }}</p>
              <a href="{{ asset("proof_of_payment/$item->file" )}}">comprobante de pago</a>
              @endforeach
            </div>
          </div>
        @endif

      @elseif($order->status->id == 2)
        <p style="margin-top: 12px">Su pedido esta siendo revisado. En breves nos comunicaremos contigo para realizar la cotizacion.</p>
      @elseif($order->status->id == 3)
        <p style="margin-top: 12px">Su pedido ha sido rechazado, para mas informacion puedes consultar a nuestro asesor de ventas.</p>
      @elseif($order->status->id == 4)
        <p style="margin-top: 12px">En estos momentos su pago esta siendo comprobado, cuando este proceso finalice se le notificara por correo para luego ser atendido por nuestro asesor de ventas.</p>
      @else
        <p style="margin-top: 12px">Enhorabuena!! tu pago ha sido comprobado, espera nuestro correo, te contactaremos.</p>
      @endif

    </article>
    <article class="data_order_product">
      <div class="table-responsive">
        <table id="table_detail_order" class="table table-bordered">
          <thead>
            <tr>
              <th>#COD</th>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Tipo de Venta</th>
              <th>Unidad por tipo de venta</th>
              {{-- <th>Precio unitario</th>
              <th>Precio total</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($order->order_products as $item)
            <tr>
              <td>{{ $item->product->code }}</td>
              <td>{{ $item->product->name }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ $item->type_of_sale }}</td>
              <td>{{ $item->quantity_by_type_of_sale }}</td>
              {{-- <td>{{ $item->price }}$</td>
              <td>
              @php
                $quantity = $item->price * $item->quantity
              @endphp
              {{ $quantity }}$
              </td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- <div class="table-responsive">
        <table id="table_detail_order" class="table table-bordered mt-4">
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
              if($order->payment_type_id == 2) {
                $igtf = number_format($igtf, 2);
              }
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
      </div> --}}
    </article>
  </section>

</main>

@include('templates.footer')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script type="module" src="{{ asset('js/tables_.js') }}"></script>
@endsection