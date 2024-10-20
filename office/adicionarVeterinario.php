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

// Coletar dados do Veterinário
$nome = $_POST['veterinarioNome'];
$telefone = $_POST['veterinarioTelefone'];
$email = $_POST['veterinarioEmail'];
$endereco = $_POST['veterinarioEndereco'];
$numero = $_POST['veterinarioNumero'];
$complemento = $_POST['veterinarioComplemento'];
$bairro = $_POST['veterinarioBairro'];
$cep = $_POST['veterinarioCep'];
$cidade = $_POST['veterinarioCidade'];
$estado = $_POST['veterinarioEstado'];

// Inserir o novo cliente no banco de dados
$sql = "INSERT INTO veterinario (nome, telefone, email, endereco, numero, complemento, bairro, cep, cidade, estado)
        VALUES ('$nome', '$telefone', '$email', '$endereco', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado')";

if ($conn->query($sql) === TRUE) {
    $novoClienteId = $conn->insert_id;
    $response = ['id_veterinario' => $novoClienteId, 'nome' => $nome];
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Erro ao cadastrar veterinário: ' . $conn->error]);
}

$conn->close();
?>