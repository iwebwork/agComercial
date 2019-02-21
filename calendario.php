<?php
  include("php/conexao.php");
  $result_events = "SELECT id, title, color, start, end FROM events";
  $resultado_events = mysqli_query($conn, $result_events);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- importado -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='locale/pt-br.js'></script>
<script>

  $(document).ready(function() {
    // Obtém a data/hora atual
    var data = new Date();

    // Guarda cada pedaço em uma variável
    var dia     = data.getDate();           // 1-31
    var dia_sem = data.getDay();            // 0-6 (zero=domingo)
    var mes     = data.getMonth();          // 0-11 (zero=janeiro)
    var ano2    = data.getYear();           // 2 dígitos
    var ano4    = data.getFullYear();       // 4 dígitos
    var hora    = data.getHours();          // 0-23
    var min     = data.getMinutes();        // 0-59
    var seg     = data.getSeconds();        // 0-59
    var mseg    = data.getMilliseconds();   // 0-999
    var tz      = data.getTimezoneOffset(); // em minutos

    // Formata a data e a hora (note o mês + 1)
    var str_data =  ano4+ '/' + (mes+1) + '/' + dia;
    var str_hora = hora + ':' + min + ':' + seg;

    // Mostra o resultado
    //alert('Hoje é ' + str_data + ' às ' + str_hora);
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: str_data,
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        //Evento padrão
        <?php
          while($row_events = mysqli_fetch_array($resultado_events)){
                ?>
                {
                id: '<?php echo $row_events['id_event']; ?>',
                title: '<?php echo $row_events['title']; ?>',
                start: '<?php echo $row_events['start']; ?>',
                end: '<?php echo $row_events['end']; ?>',
                color: '<?php echo $row_events['color']; ?>',

                },<?php
              }
        ?>
      ]
    });

  });

</script>
<!-- Pessoal -->
<link href="css/body.css" rel="stylesheet" type="text/css"></link>
<link href="css/menu.css" rel="stylesheet" type="text/css"></link>

</head>
<body>

  <div class="container area-menu">
      <div class="row d-flex justify-content-around">
        <div class="col-xm">
          
        </div>
        <div class="col-xm font-weight-bold">
          AgComercial
        </div>
        <div class="col-xm"> 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Inserir Compromisso
          </button>
        </div>

      </div>

  </div> 

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

         

          <!-- Modal body -->
          <div class="modal-body">

          <!-- Inicio do formulario para cadastro de eventos -->
         
            <form method="POST" action="php/adicionarEvento.php">
                <div class="form-group">
                  <label for="text">Evento</label>
                  <input type="text" class="form-control" name="evento" id="email" requeired>
                </div>
                <div class="form-group">
                  <label for="date">data Inicio</label>
                  <input type="date-time" class="form-control" name="data-inicio" requeired>
                </div>

                <div class="form-group">
                  <label for="date-time">data Termino</label>
                  <input type="date" class="form-control" name="data-termino">
                </div>
            

                <div class="form-group">
                  <label for="date">Cor ( Opcional: Caso nao forneca, por padrao virar azul escuro)</label>
                  <input type="color" class="form-control" name="color" value="#0071c5">
                </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <div class="row d-flex justify-content-between">

                  <input type="submit" class="btn btn-primary">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>

        </div>
      </div>
    </div>
   </div>

  <div class="container">
    <div class="row"> 
      <div id='calendar'></div>
    </div>
    
  </div>
</body>
</html>
