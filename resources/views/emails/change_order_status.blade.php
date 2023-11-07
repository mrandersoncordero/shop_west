<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 0; padding: 0; background-color: #f7f7f7; font-family: Arial, sans-serif; text-align: center;">

  <div style="width: 100%; margin-top:24px;">
    <div style="background-color: #f7f7f7; width: 40%; margin: auto;">
      <!-- Contenedor principal con margen inferior y color de texto gris -->
      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; align-items: center; justify-content: center; margin: auto;">
          <img src="{{ asset('images/logo.png') }}" alt="Logo de la tienda" style="max-width: 200px;" />
        </div>
      </div>

      <div style="width: 96%; padding: 16px;">
      @if ($order->status_id == 1)
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px;">En hora buena {{ $order->user->profile->full_name()}} tu pedido #{{ $order->id }} ha sido aprobado.</p>
        <p style="margin-bottom: 16px;">Dirigete ahora a <a href="{{ route('order.index') }}">{{ route('order.index') }}</a> y reporta tu pago.</p>
        <p style="margin-bottom: 16px;">Recuerda que si el metodo de pago que seleccionaste para esta orden es: <b>pago movil o transferencia</b>. Puedes adjuntar tu comprobante y referencia de pago desde la web, en caso contrario te recomendamos ponerte en contacto con nuestro asesor de ventas. <a href="https://api.whatsapp.com/message/FKHYQ5DCEGCQM1" target="_blank" data-v-c02e9916="">asesor de ventas</a> que te indicara como proceder.</p>
      @elseif($order->status_id == 2)
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px;">{{ $order->user->profile->full_name()}} tu pedido #{{ $order->id }} esta siendo revisado por uno de nuestros administradores.</p>
        <p style="margin-bottom: 16px;">Cuando el estado de tu orden sea cambiado se te notificara tanto por correo y por via telefonica.</p>
        <p style="margin-bottom: 16px;">Recuerda que si tienes alguna consulta extra puedes contactar con nuestro <a href="https://api.whatsapp.com/message/FKHYQ5DCEGCQM1" target="_blank" data-v-c02e9916="">asesor de ventas</a> que te indicara como proceder.</p>
      @else
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px;">Lo sentimos {{ $order->user->profile->full_name()}} tu pedido #{{ $order->id }} ha sido rechazado.</p>
        <p style="margin-bottom: 16px;">Lamentamos que tu pedido alla sido rechazado, si quieres saber mas acerca de esto contacta a nuestro <a href="https://api.whatsapp.com/message/FKHYQ5DCEGCQM1" target="_blank" data-v-c02e9916="">asesor de ventas</a> que te indicara como proceder.</p>

      @endif
        <p style="margin-bottom: 16px;">Gracia por preferirnos.</p>

      </div>

      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <p>Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
      </div>
    </div>
  </div>

</body>
</html>
