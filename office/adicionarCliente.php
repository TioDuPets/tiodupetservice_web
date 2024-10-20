<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Coletar dados do cliente
$nome = $_POST['clienteNome'];
$cpf = $_POST['clienteCpf'];
$telefone = $_POST['clienteTelefone'];
$email = $_POST['clienteEmail'];
$endereco = $_POST['clienteEndereco'];
$numero = $_POST['clienteNumero'];
$complemento = $_POST['clienteComplemento'];
$bairro = $_POST['clienteBairro'];
$cep = $_POST['clienteCep'];
$cidade = $_POST['clienteCidade'];
$estado = $_POST['clienteEstado'];

// Inserir o novo cliente no banco de dados
$sql = "INSERT INTO cliente (nome, cpf, telefone, email, endereco, numero, complemento, bairro, cep, cidade, estado)
        VALUES ('$nome', '$cpf', '$telefone', '$email', '$endereco', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado')";

if ($conn->query($sql) === TRUE) {
    $novoClienteId = $conn->insert_id;
    $response = ['id_cliente' => $novoClienteId, 'nome' => $nome];
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Erro ao cadastrar cliente: ' . $conn->error]);
}

$conn->close();
?>
