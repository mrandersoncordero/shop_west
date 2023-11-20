<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4f4; font-family: Arial, sans-serif; text-align: center; display:flex; align-items:center; justify-content:center;">

  <div style="width: 80%; margin-top:24px; margin:auto;">
    <div style="background-color: #ffffff; width: 100%; margin: auto;">
      <!-- Contenedor principal con margen inferior y color de texto gris -->
      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; flex-direction: column; align-items: center;">
          <img src="{{ asset('images/logo.png')}}" alt="Logo de la tienda" style="max-width: 200px;" />
        </div>
      </div>

      <div style="width: 96%; text-align: center; padding: 16px;">
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px; font-size: 1.25rem;">Gracias por solicitar un usuario, {{ $user->profile->full_name()}}.</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">Siguiendo los datos que nos proporcionaste, hemos creado la cuenta y a continuación, encontrarás tu correo electrónico. Por favor, dirígete a nuestra web e inicia sesión.</p>
        <p style="font-weight: bold; font-size: 1.25rem;">Email: {{ $user->email}}</p>

        <!-- Párrafo de agradecimiento -->
        <p style="margin-top: 16px; font-size: 1.25rem;">Gracias por unirte a nuestra tienda en línea.</p>
      </div>

      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <p>Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
      </div>
    </div>
  </div>
</body>
</html>
