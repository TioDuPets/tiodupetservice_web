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
    <link rel="stylesheet" href="officestyle.css">


  </head>
  <div style="height: 4vh;"></div>

  <body>
        <div class="container justify-content-center align-items-center">
              <div id='calendar'></div>
        </div>
  </body>

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

        locale: 'pt-br',
  
        displayEventTime: false, // don't show the time column in list view
  

       
       events: 'listar_eventos.php',
  
        eventClick: function(arg) {

  
          // prevents current tab from navigating
          arg.jsEvent.preventDefault();
        }
  
      });
  
      calendar.render();
    });
  </script>


    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.9/index.global.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.9/index.global.min.js'></script>

<div style="height: 4vh;"></div>
  <?php
include 'footer.php';
?>
</html>