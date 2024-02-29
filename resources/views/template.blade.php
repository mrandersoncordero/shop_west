<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- Favicon --}}
  {{-- <link rel="icon" href="{{ asset('icons/diana.ico') }}" type="image/x-icon"> --}}

  {{-- Metaetiquetas para redes sociales  --}}
  <meta property="og:image" content="{{ asset('favicon.ico') }}">
  <meta property="og:image:secure_url" content="{{ asset('favicon.ico') }}">
  <meta property="og:image:type" content="image/x-icon">
  <meta property="og:image:width" content="48"> <!-- Ancho del icono en píxeles -->
  <meta property="og:image:height" content="48"> <!-- Altura del icono en píxeles -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

  @yield('head_content')

  <!-- fontawesone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" async>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" async></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/utils.css') }}">

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