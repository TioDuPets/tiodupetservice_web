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

// Prepara a consulta SQL
$stmt = $conexao->prepare("INSERT INTO cliente (nome, cpf, telefone, email, endereco, numero, complemento, bairro, cep, cidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Obtém os valores do formulário
$nome = $_POST['txtNome'];
$cpf = $_POST['txtCpf'];
$telefone = $_POST['txtTelefone'];
$email = $_POST['txtEmail'];
$endereco = $_POST['txtEndereco'];
$numero = $_POST['txtNumero'];
$complemento = $_POST['txtComplemento'];
$bairro = $_POST['txtBairro'];
$cep = $_POST['txtCep'];
$cidade = $_POST['txtCidade'];
$estado = $_POST['txtEstado'];

// Associa os parâmetros à consulta
$stmt->bind_param("sssssssssss", $nome, $cpf, $telefone, $email, $endereco, $numero, $complemento, $bairro, $cep, $cidade, $estado);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cadastro de Cliente realizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
