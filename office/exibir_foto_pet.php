<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Cria a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Pega o ID do pet
$pet_id = $_GET['id'];

// Consulta para obter a imagem do pet
$sql = "SELECT foto_pet FROM pet WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $pet_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($foto_pet);
$stmt->fetch();

if ($foto_pet) {
    // Define o cabeçalho como imagem
    header("Content-Type: image/jpeg");
    echo $foto_pet; // Exibe a imagem binária
} else {
    echo "Imagem não encontrada."; // Caso não haja imagem
}

// Fecha a conexão
$stmt->close();
$conexao->close();
?>
