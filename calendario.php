<?php
  include_once 'php/classes/evento.class.php';
  $servidor = "127.0.0.1";
  $usuario = "root";
  $senha = "";
  $banco = "u270517400_ag";
  $conn = mysqli_connect($servidor,$usuario,$senha,$banco);
  $sql = "SELECT * FROM eventos";
  $resultado_eventos = mysqli_query($conn,$sql);

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
      events:[
        <?php
          $event = new Eventos();
          while ($dados = mysqli_fetch_array($resultado_eventos) ) {
            $start = $dados['start_date'].'T'.$dados['start_hora'];
            $end = $dados['fim_date'].'T'.$dados['fim_hora'];
            $status = $event->strReturnStatus($dados['status']);
            //echo $start;
            //echo $end;
        ?>
        {
          id: '<?php echo $dados['id_evento']; ?>',
          title:'<?php echo $dados['title'].' - '.$status; ?>',
          start:'<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color:'<?php echo $dados['color']; ?>',
        },
        <?php
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
        <div class="col-xm font-weight-bold">
          
        </div>
        <div class="col-xm font-weight-bold">
          
        </div>
        <div class="col-xm font-weight-bold">
          
        </div>
        <div class="col-xm font-weight-bold">
          Agenda
        </div>
        <div class="col-xm font-weight-bold">
          
        </div>
        <div class="col-xm"> 
          <a href="index.php" class="btn btn-primary">
            Retornar a pagina inicial
          </a>
        </div>
        <div class="col-xm font-weight-bold">
          
        </div>

      </div>

  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xm">
        <div id='calendar'></div>  
      </div>
      
    </div>
    
  </div>
</body>
</html>
