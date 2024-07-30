<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $metaData['title'] ?? 'Productos Occidente, C.A.' }}</title>

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <meta name="description" content="{{ $metaData['description'] ?? 'Fabricamos productos de construcción de alta calidad en Venezuela, incluyendo pegamentos, revestimientos y sella juntas. ¡Conozca nuestra línea completa!' }}">
  <meta name="keywords" content="{{ $metaData['keywords'] ?? 'pego, construccion, adhesivos, Productos Occidente, pegoccidente, Barquisimeto' }}">
  <link rel="canonical" href="{{ $metaData['canonical'] ?? url()->current() }}">
  <meta property="og:locale" content="es_VE">
  <meta property="og:type" content="website">
  <meta property="og:title" content="{{ $metaData['og_title'] ?? 'Productos Occidente, C.A.' }}">
  <meta property="og:description" content="{{ $metaData['og_description'] ?? 'Fabricamos productos de construcción de alta calidad en Venezuela, incluyendo pegamentos, revestimientos y sella juntas. ¡Conozca nuestra línea completa!' }}">
  <meta property="og:url" content="{{ $metaData['canonical'] ?? url()->current() }}">
  <meta property="og:site_name" content="Productos Occidente, C.A.">
  <meta property="og:image" content="{{ $metaData['og_image'] ?? asset('favicon.ico') }}">
  <meta property="og:image:secure_url" content="{{ asset('favicon.ico') }}">
  <meta property="og:image:type" content="image/x-icon">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/diana.png') }}">

  @yield('head_content')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" async>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" async></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/utils.css') }}">

  @yield('styles')

</head>
<body>
  @include('layouts.nav')

  @yield('content')

  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/menu.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  @yield('scripts')
</body>
</html>
