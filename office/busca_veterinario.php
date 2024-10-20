<?php
include('conexaoAction.php'); // Conexão com o banco de dados

$query = $_GET['query'];
$sql = "SELECT id_veterinario, nome, telefone FROM veterinario WHERE nome LIKE '%$query%' OR telefone LIKE '%$query%' LIMIT 10";
$result = mysqli_query($conn, $sql);

$veterinarios = [];
while ($row = mysqli_fetch_assoc($result)) {
    $veterinarios[] = $row;
}

echo json_encode($veterinarios);
?>