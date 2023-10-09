<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="{{ asset('css/nav_dashboard.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  @yield('head_content')
</head>
<body>

  @include('templates.navigation')
  @yield('content')
  
  <script src="{{ asset('js/nav_dashboard.js') }}"></script>
</body>
</html>