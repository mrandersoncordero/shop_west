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

    <form action="{{ route('orders.update', $order) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-floating mb-3">
        <select class="form-select" id="payment_type" name="payment_type">
          @foreach ($payment_type as $payment)
            <option value="{{ $payment->id }}" @if ($payment->id == $order->payment_type_id) @selected(true) @endif>{{ $payment->name }}</option>
          @endforeach
        </select>
        <label for="Subcategory">Tipo de Pago</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control @error('price_total') is-invalid @enderror " name="price_total" value="{{ old('price_total', $order->price_total)}}">
        <label for="floatingInput">Precio Total en $</label>
        @error('price_total')
        <div class="invalid-feedback">
          {{ $message }}
        </div> 
        @enderror
      </div>

      <div class="form-floating mb-3">
        <select class="form-select" id="retreat" name="retreat">
          <option value="Retiro en Tienda" @if ($order->retreat == "Retiro en Tienda") @selected(true) @endif>Retiro en Tienda</option>
          <option value="Envio" @if ($order->retreat == "Envio") @selected(true) @endif>Envio</option>
        </select>
        <label for="Subcategory">Tipo de Pago</label>
      </div>

      <div style="display: flex; align-items: center;">
        <input type="submit" value="Enviar" class="btn btn-primary">
      </div>
    </form>
    
    <h2 style="margin-top: 12px">Productos de la orden</h2>
    <table class="display table table-bordered" style="margin-top: 12px">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Tipo de Venta</th>
          <th>Cantidad por tipo de venta</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($order->order_products as $key => $item)
      <tr>
        <td>{{ $key +1 }}</td>
        <td>{{ $item->product->code }}</td>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->type_of_sale }}</td>
        <td>{{ $item->quantity_by_type_of_sale }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  
    {{-- Formulario para agregar productos a la orden --}}
    <form method="post" action="{{ route('orders.addProduct', $order) }}">
      
      <p>Agregar productos a la orden</p>
      @csrf
      <div class="form-floating mb-3">
        <select class="form-select" name="product_id">
          @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
          @endforeach
        </select>
        <label for="Subcategory">Producto:</label>
      </div>

      <div class="form-floating mb-3">
        <input type="number" class="form-control @error('quantity') is-invalid @enderror " name="quantity" min="1" value="{{ old('quantity', $order->quantity)}}">
        <label for="floatingInput">Cantidad</label>
        @error('quantity')
        <div class="invalid-feedback">
          {{ $message }}
        </div> 
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>

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