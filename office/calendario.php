<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="calendar/calendar.css">
    <link rel="stylesheet" href="officestyle.css">


  </head>
  <div style="height: 4vh;"></div>
  <body>

  <div class="container justify-content-center align-items-center">
    <div id='calendar'></div>
    <script src='calendar/index.global.min.js'></script>
    <script src='calendar/locales-all.global.js'></script>
    <script src='calendar/pt-br.global.min.js'></script>

    </div>

  </body>
  <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
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

  <div style="height: 4vh;"></div>
  <?php
include 'footer.php';
?>
</html>