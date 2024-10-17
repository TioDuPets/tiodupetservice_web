<?php
require_once 'vendor/autoload.php'; // Inclui o autoload da biblioteca Google

session_start();

// Configurando o cliente Google
$client = new Google_Client();
$client->setAuthConfig('credentials.json'); // Caminho para o seu arquivo de credenciais
$client->addScope(Google_Service_Calendar::CALENDAR);
$client->setRedirectUri('http://localhost/tiodupetservice_web/office/callback.php');

// Verifica se o token de acesso já está salvo na sessão
if (!isset($_SESSION['access_token'])) {
    // Se não estiver, redireciona o usuário para fazer a autenticação
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit();
} else {
    // Se já estiver autenticado, usa o token de acesso da sessão
    $client->setAccessToken($_SESSION['access_token']);

    // Verifica se o token expirou e renova, se necessário
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        $_SESSION['access_token'] = $client->getAccessToken();
    }

    // Instancia o serviço do Google Calendar
    $service = new Google_Service_Calendar($client);

    // Obtém os eventos do seu banco de dados (aqui, simula um evento)
    $eventData = [
        'summary' => 'Agendamento de Pet',
        'description' => 'Serviço de pet-sitter para o PetTeste',
        'start' => [
            'dateTime' => '2024-10-20T07:45:00-03:00',
            'timeZone' => 'America/Sao_Paulo',
        ],
        'end' => [
            'dateTime' => '2024-10-20T08:45:00-03:00',
            'timeZone' => 'America/Sao_Paulo',
        ],
    ];

    // Cria o evento no Google Calendar
    $event = new Google_Service_Calendar_Event($eventData);
    $calendarId = 'primary'; // ID do calendário (pode ser primary ou um ID específico)
    $event = $service->events->insert($calendarId, $event);

    echo 'Evento criado com sucesso: ' . $event->htmlLink;
}
