<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4f4; font-family: Arial, sans-serif; text-align: center; display:flex; align-items:center; justify-content:center;">

  <div style="width: 80%; margin-top:24px; margin:auto;">
    <div style="background-color: #ffffff; width: 40%; margin: auto;">
      <!-- Contenedor principal con margen inferior y color de texto gris -->
      <div style="margin-bottom: 4px; background-color: #ffffff; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; flex-direction: column; align-items: center;">
          <img src="{{ asset('images/logo.png')}}" alt="Logo de la tienda" style="max-width: 200px;" />
        </div>
      </div>

      <div style="width: 96%; text-align: center; padding: 16px;">
        <!-- Párrafos con márgenes inferiores y fuente en negrita -->
        <p style="margin-bottom: 16px; font-size: 1.50rem;">{{ $greeting }}</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">{{ $introLines[0] }}</p>
        <p style="margin-bottom: 16px; font-size: 1.25rem;">{{ $introLines[1] }}</p>
        <p style="font-weight: bold; font-size: 1.25rem;">{{ $introLines[2] }}</p>

        <!-- Enlace de acción para restablecer la contraseña -->
        <p style="margin-top: 16px; font-size: 1.25rem;"><a href="{{ $actionUrl }}">{{ $actionText }}</a></p>
        
        <!-- Párrafo de agradecimiento -->
        <p style="font-size: 1.25rem;">Si tienes problemas haciendo clic en el botón "Restablecer contraseña", copia y pega la siguiente URL en tu navegador web:</p>
        <p style="font-size: 1.25rem;">{{ route('password.reset', ['token' => $token]) }}</p>

      </div>

      <div style="margin-bottom: 4px; background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px; display: flex; flex-direction: column; align-items: center;">
        <p>Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
      </div>
    </div>
  </div>
</body>
</html>
