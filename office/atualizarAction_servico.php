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

// Prepara a consulta SQL para atualizar o serviço
$stmt = $conexao->prepare("UPDATE servico SET servico = ?, tipo = ?, preco = ? WHERE id = ?");

// Obtém os valores do formulário
$servico = $_POST['txtServico'];
$tipo = $_POST['txtTipo'];
$preco = (float)$_POST['txtPreco']; // Converte o preço para float
$id = (int)$_POST['txtID']; // Obtém o ID do serviço a ser atualizado

// Associa os parâmetros à consulta
$stmt->bind_param("ssdi", $servico, $tipo, $preco, $id); // "ssdi" indica: string, string, double, integer

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Serviço atualizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
