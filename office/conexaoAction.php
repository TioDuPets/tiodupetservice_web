<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Criando a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}
?>
