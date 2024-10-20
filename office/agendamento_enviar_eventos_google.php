<?php
require 'vendor/autoload.php'; // Certifique-se de que você já instalou o Google API Client com o Composer

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

function criarEventoGoogleCalendar($cliente, $tipo, $start, $end, $observacoes) {
    // Configurar o cliente Google
    $client = new Google_Client();
    $client->setApplicationName('Agenda de Pets');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig('credentials.json'); // Caminho para o seu arquivo de credenciais JSON
    $client->setAccessType('offline');

    $service = new Google_Service_Calendar($client);

    // Dados do evento
    $event = new Google_Service_Calendar_Event(array(
        'summary' => "Serviço: $tipo - Cliente: $cliente",
        'description' => $observacoes,
        'start' => array(
            'dateTime' => date('c', strtotime($start)),
            'timeZone' => 'America/Sao_Paulo',
        ),
        'end' => array(
            'dateTime' => date('c', strtotime($end)),
            'timeZone' => 'America/Sao_Paulo',
        ),
    ));

    // Define o calendário para onde enviar o evento (use "primary" para o calendário principal)
    $calendarId = 'primary';
    $event = $service->events->insert($calendarId, $event);

    echo 'Evento criado com sucesso: ' . $event->htmlLink;
}
?>
