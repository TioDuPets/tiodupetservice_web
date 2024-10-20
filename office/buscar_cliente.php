<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o id_cliente foi passado via GET
if (isset($_GET['id_cliente'])) {
    $id_cliente = intval($_GET['id_cliente']);

    // Buscar o cliente associado ao id_cliente
    $sql = "SELECT nome FROM cliente WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Retorna o nome do cliente em formato JSON
        $cliente = $result->fetch_assoc();
        echo json_encode($cliente);
    } else {
        // Se o cliente não for encontrado, retornar um erro
        echo json_encode(['error' => 'Cliente não encontrado']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'ID do cliente não fornecido']);
}

$conn->close();
?>
