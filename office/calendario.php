<?php
session_start();

$tempoExpiracao = 300;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $tempoExpiracao)) {
    session_unset(); 
    session_destroy(); 
    header("Location: login.php");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <!--link rel="stylesheet" href="calendar/bootstrap5.1.3.min.css"-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="calendar/calendar.css">
    <link rel="stylesheet" href="officestyle.css">


  </head>
  <div style="height: 4vh;"></div>
  <body>

  <div class="container justify-content-center align-items-center">
    <div id='calendar'></div>

    </div>

  </body>
  <script src='bootstrap.bundle.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script src='calendar/calendar_locales-all.global.min.js'></script>
  <script src='calendar/calendar_pt-br.global.js'></script>
  <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {

  themeSystem: 'bootstrap5',

    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },

    locale:'pt-br',

   initialView: 'dayGridMonth',
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectMirror: true,
    
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events:'listar_eventos.php', // A URL do arquivo que retorna os eventos
    
  });

  calendar.render();
});

</script>

<script src='calendar/bootstrap5_index.global.min.js'></script>
<div style="height: 4vh;"></div>
  <?php
include 'footer.php';
?>
</html>