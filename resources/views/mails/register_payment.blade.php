<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4f4; font-family: Arial, sans-serif; text-align: center; display:flex; align-items:center; justify-content:center;">

  <div style="width: 80%; margin-top:24px; margin:auto;">
    <div style="background-color: #ffffff; width: 40%; margin: auto;">
      <!-- Contenedor principal con margen inferior y color de texto gris -->
      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; align-items: center; justify-content: center; margin: auto;">
          <img src="{{ asset('images/logo.png') }}" alt="Logo de la tienda" style="max-width: 200px;" />
        </div>
      </div>

      <div style="width: 96%; padding: 16px;">
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px; font-size: 1.25rem;">El usuario, {{ '@'.$user->name }} ha anexado su comprobante de pago para el pedido #{{ $order->id }}.</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">Comprueba cuanto antes el comprobante de pago y recuerda cambiar el estatus del pedido.</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">Una vez este confirmado dicho comprobante contacte con el cliente, {{ $user->first_name.' '.$user->last_name}}.</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">La informacion de contacto del cliente es: <b>correo:</b> {{ $user->email }} y su <b>telefono:</b> {{ $user->phone_number}}.</p>

      </div>

      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <p>Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
      </div>

    </div>
  </div>

</body>
</html>
