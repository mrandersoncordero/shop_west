<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 0; padding: 0; background-color: #f7f7f7; font-family: Arial, sans-serif; text-align: center;">

  <main style="background-color: #f7f7f7; max-width: 600px;">
    <!-- Contenedor principal con margen inferior y color de texto gris -->
    <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
      <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="https://www.pegoccidente.com/_nuxt/img/logo-white.42e7c10.png" alt="Logo de la tienda" style="max-width: 200px;" />
      </div>
    </div>

    <div style="width: 96%; text-align: center; padding: 16px;">
      <!-- Párrafos con márgenes inferiores y fuente en negrita -->
      <p style="margin-bottom: 16px;">El usuario, {{ '@'.$user->name }} ha confirmado su carrito de compra, creando la orden: {{ $order->id }}.</p>
      <p style="margin-bottom: 16px;">La informacion de la orden es:</p>
      
      <p><b>Tipo de pago:</b> {{ $order->payment_type->name }}.</p>
      <p><b>Estado del pedido:</b> {{ $order->status->name }}.</p>
      <p><b>Subtotal:</b> {{ $order->price_total }}</p>
      <p>{{ $order->created_at }}</p>

      <table class="display table table-bordered mt-4">
        <thead>
          <tr>
            <th>#COD</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->order_products as $item)
          <tr>
            <td>{{ $item->product->code }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

    <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
      <p>Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
    </div>
  </main>
</body>
</html>
