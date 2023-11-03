<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f7f7f7; font-family: Arial, sans-serif; text-align: center;">

  <main class="w-100" style="background-color: #f7f7f7;">
    <!-- Contenedor principal con margen inferior y color de texto gris -->
    <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
      <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="https://www.pegoccidente.com/_nuxt/img/logo-white.42e7c10.png" alt="Logo de la tienda" style="max-width: 200px;" />
      </div>
    </div>

    <div style="width: 96%; text-align: center; padding: 16px;">
      <!-- Párrafos con márgenes inferiores y fuente en negrita -->
      <p style="margin-bottom: 16px;">Gracias por solicitar un usuario, {{ $user->profile->full_name()}}.</p>
      <p style="margin-bottom: 16px;">Siguiendo los datos que nos proporcionaste, hemos creado la cuenta y a continuación, encontrarás tu correo electrónico. Por favor, dirígete a nuestra web e inicia sesión.</p>
      <p style="font-weight: bold;">Email: {{ $user->email}}</p>

      <!-- Párrafo de agradecimiento -->
      <p style="margin-top: 16px;">Gracias por unirte a nuestra tienda en línea.</p>
    </div>

    <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
      <p>Pegoocidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
    </div>
  </main>
</body>
</html>
