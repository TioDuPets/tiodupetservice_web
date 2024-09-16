<?php defined('CONTROL') or die('Acesso inválido.') ?>
<?php
$action = isset($_GET['a']) ? $_GET['a'] : 'home';
switch($action){
    case 'home':
        require_once('home.php');
        break;
    case 'services':
        require_once('services.php');
        break;
    case 'contacts':
        require_once('contacts.php');
        break;
    case 'login':
        require_once('login.php');
        break;
    default:
        require_once('home.php');
}
?>