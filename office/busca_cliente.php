<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Recebe o termo de busca via GET
$query = $_GET['query'];

// Evita SQL injection escapando a entrada
$searchQuery = $conexao->real_escape_string($query);

// Consulta ao banco de dados para buscar clientes
$sql = "SELECT id_cliente, nome, cpf FROM cliente 
        WHERE nome LIKE '%$searchQuery%' 
        OR cpf LIKE '%$searchQuery%' 
        OR email LIKE '%$searchQuery%'";

$resultado = $conexao->query($sql);

// Cria um array para armazenar os resultados
$clientes = array();

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $clientes[] = $linha;
    }
}

// Retorna os resultados como JSON
echo json_encode($clientes);

// Fecha a conexão
$conexao->close();
?>
