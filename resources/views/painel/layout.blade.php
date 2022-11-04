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

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('public/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

    <title>Painel</title>
  </head>
  <body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="col-md-3 text-center">
        <img src="{{ asset('public/images/logo.png') }}" width="280" class="img-fluid" alt="Hsist">
      </div>
      <div class="col-md-6">&nbsp;</div>
      <div class="col-md-3 text-center">
        <h2><span class="navbar-text" id="data_hora">XX/XX/XXXX - XX:XX:XX</span></h2>
      </div>
    </nav>
  
    <div class="container-fluid h-100">
      @yield('content')
    </div>

    <!-- JavaScript -->
    <script>
      $(document).ready(function() {
        // Som de alerta => soundbible.com
        var audio = new Audio("{{ asset('public/audio/bells.mp3') }}");

        // Chama a próxima senha
        function exib_senh() {
              $.get("{{ route('painel.chamada') }}").done(function(wo_dados) {
                  $('.senha > tbody').html('');
                  $(wo_dados).each(function() {
                       ws_linha = '<tr><td class="text-center">' +
                      '<p class="text-muted" style="font-size: 60px; font-weight: 1000;">' + this.tipate + '</p>' +
                      '<p style="font-size: 90px; font-weight: 1000;">' + this.codigo + '</p>' +
                      '<p class="text-muted" style="font-size: 60px; font-weight: 1000;">' + this.guiche + '</p></td></tr>';
                      $('.senha > tbody').append(ws_linha);
                      
                      // Toca som de alerta 
                      audio.play();

                      // Pisca a senha
                      $('.senha > tbody').fadeOut(400);
                      $('.senha > tbody').fadeIn(400);
                      
                      // Atualiza o histórico
                      exib_hist(this.codigo);
                  });
              });
          }

          // Atualiza o histórico
          function exib_hist(id) {
              $.get("{{ URL::to('/historico') }}/"+id).done(function(wo_dados) {
                  $('.histor').html('');
                  $(wo_dados).each(function() {
                      ws_linha = '<tr><td>' +
                      '<p class="text-dark" style="font-size: 40px; font-weight: 1000;">' + this.codigo + '</p>' +
                      '<p class="text-muted" style="font-size: 18px; font-weight: 1000;">' + this.guiche + '</p></td></tr>';
                      $('.histor').append(ws_linha);
                  });
              });
          }

          exib_hist(0);

          setInterval(function(){
            exib_senh();
          }, 5000);

          // Preenche o horário
          function preenche_horario() {
            date = new Date();
            ws_dathor = ("0" + date.getDate()).slice(-2) + "/" + ("0" + (date.getMonth() + 1)).slice(-2) + "/" + date.getFullYear() + " - " + ("0" + date.getHours()).slice(-2) + ":" + ("0" + date.getMinutes()).slice(-2) + ":" + ("0" + date.getSeconds()).slice(-2);
            $('#data_hora').html(ws_dathor);
          }

          preenche_horario();

          setInterval(function() {
            preenche_horario();
          }, 1000);
      })
    </script>
  </body>
</html>
