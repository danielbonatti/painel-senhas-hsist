<!DOCTYPE html>
<html lang="pt-br" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <title>Setores</title>
  </head>
  <body class="d-flex flex-column h-100 bg-white">
    
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="col-md-3 text-center">
        <img src="{{ asset('images/logo.png') }}" width="280" class="img-fluid" alt="Hsist">
      </div>
      <div class="col-md-9">&nbsp;</div>
    </nav>
    
    <div class="container">
      @yield('content')
    </div>
    
  </body>
</html>
