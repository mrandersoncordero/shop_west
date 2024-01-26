<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- Favicon --}}
  {{-- <link rel="icon" href="{{ asset('icons/diana.ico') }}" type="image/x-icon"> --}}

  {{-- Metaetiquetas para redes sociales  --}}
  <meta property="og:image" content="{{ asset('icons/diana.ico') }}">
  <meta property="og:image:secure_url" content="{{ asset('icons/diana.ico') }}">
  <meta property="og:image:type" content="image/x-icon">
  <meta property="og:image:width" content="64"> <!-- Ancho del icono en píxeles -->
  <meta property="og:image:height" content="64"> <!-- Altura del icono en píxeles -->
  
  @yield('head_content')

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
  <!-- fontawesone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</head>
<body>
  @include('layouts.nav')

  @yield('content')
  

  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/menu.js') }}"></script>
  <!-- IONICONS -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  @yield('scripts')

</body>
</html>