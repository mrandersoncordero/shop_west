<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4f4; font-family: Arial, sans-serif; text-align: center; display:flex; align-items:center; justify-content:center;">

  <div style="width: 80%; margin-top:24px; margin:auto;">
    <div style="background-color: #ffffff; width: 100%; margin: auto;">
      <!-- Contenedor principal con margen inferior y color de texto gris -->
      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; align-items: center; justify-content: center; margin: auto;">
          <img src="{{ asset('images/logo.png') }}" alt="Logo de la tienda" style="max-width: 200px;" />
        </div>
      </div>

      <div style="width: 96%; padding: 16px;">
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px; font-size: 1.25rem;">El usuario, {{ '@'.$user->name }} ha confirmado su carrito de compra, creando la orden: {{ $order->id }}.</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">La informacion de la orden es:</p>
        
        <p style="font-size: 1.25rem;"><b>Tipo de pago:</b> {{ $order->payment_type->name }}.</p>
        <p style="font-size: 1.25rem;"><b>Estado del pedido:</b> {{ $order->status->name }}.</p>
        <p style="font-size: 1.25rem;"><b>Subtotal:</b> {{ $order->price_total }}</p>
        <p style="font-size: 1.25rem;">{{ $order->created_at }}</p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 16px; font-size: 1rem;">
          <thead>
            <tr style="background-color: #f7f7f7; border-bottom: 2px solid #ddd; font-weight: bold;">
              <th style="padding: 8px; text-align: left;">#COD</th>
              <th style="padding: 8px; text-align: left;">Nombre</th>
              <th style="padding: 8px; text-align: left;">Cantidad</th>
              <th style="padding: 8px; text-align: left;">Precio unitario</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order->order_products as $item)
              <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $item->product->code }}</td>
                <td style="padding: 8px;">{{ $item->product->name }}</td>
                <td style="padding: 8px;">{{ $item->quantity }}</td>
                <td style="padding: 8px;">{{ $item->product->price }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>

      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <p>Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
      </div>

    </div>
  </div>

</body>
</html>
