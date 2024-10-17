<?php
require_once 'vendor/autoload.php'; // Inclui o autoload da biblioteca Google

session_start();

$client = new Google_Client();
$client->setAuthConfig('credentials.json'); // Caminho para o arquivo de credenciais
$client->addScope(Google_Service_Calendar::CALENDAR);
$client->setRedirectUri('http://localhost/tiodupetservice_web/office/callback.php');

// Verifica se o código de autorização foi enviado pelo Google
if (isset($_GET['code'])) {
    // Troca o código de autorização pelo token de acesso
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    // Armazena o token de acesso na sessão
    $_SESSION['access_token'] = $token;

    // Redireciona de volta para a página de envio dos eventos
    header('Location: http://localhost/tiodupetservice_web/office/enviar_eventos_google.php');
    exit();
}
