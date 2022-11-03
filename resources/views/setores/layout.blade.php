<!DOCTYPE html>
<html lang="pt-br" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <style>
      body {
        padding-top: 6.5rem;
      }
      .footer {
        background-color: #B7D8E1;
      }
    </style>

    <title>Setores</title>
  </head>
  <body class="d-flex flex-column h-100 bg-white">
    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
      <img src="{{ asset('public/images/logo.png') }}" width="280" class="img-fluid" alt="Hsist">
    </nav>
    
    <div class="container">
      @yield('content')
    </div>
    
    <!--<footer class="footer mt-auto py-3">
      <div class="container-fluid">
        <img src="{{ asset('public/images/logo.png') }}" width="280" class="img-fluid" alt="Hsist">
      </div>
    </footer>-->

    <!-- JavaScript -->
    <script>
      /* Imprime senha  
      function Imprime(arr){
        window.location.href = '{{URL::to("/senha")}}/'+arr[0]
      }*/
      //window.location.href = '{{route("painel","P")}}'
    </script>
  </body>
</html>
