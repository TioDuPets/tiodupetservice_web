<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Cria a conexão com o banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Falha na conexão com o banco de dados: ' . $conexao->connect_error]));
}

// Obtém o ID do veterinário a ser excluído
$id = (int)$_POST['txtID'];

// Prepara a consulta SQL para excluir o veterinário
$sql = "DELETE FROM cliente WHERE id = ?";

// Prepara a consulta
$stmt = $conexao->prepare($sql);

// Verifica se a preparação foi bem-sucedida
if (!$stmt) {
    die(json_encode(['status' => 'error', 'message' => 'Erro ao preparar a exclusão: ' . $conexao->error]));
}

// Associa o parâmetro ID à consulta
$stmt->bind_param("i", $id);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cliente excluído com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao excluir o cliente: ' . $stmt->error]);
}

// Fecha a conexão
$conexao->close();
?>
