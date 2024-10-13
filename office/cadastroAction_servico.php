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

// Prepara a consulta SQL para inserir o novo serviço
$stmt = $conexao->prepare("INSERT INTO servico (servico, tipo, preco) VALUES (?, ?, ?)");

// Obtém os valores do formulário
$servico = $_POST['txtServico'];
$tipo = $_POST['txtTipo'];
$preco = (float)$_POST['txtPreco']; // Converte o preço para float

// Associa os parâmetros à consulta
$stmt->bind_param("ssd
", $servico, $tipo, $preco); // "ssd" indica: string, string, double

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cadastro de Serviço realizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
