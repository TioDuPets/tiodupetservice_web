<?php
header('Content-Type: application/json'); // Define o conteúdo como JSON

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Cria a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conexao->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Falha na conexão com o banco de dados: ' . $conexao->connect_error]);
    exit();
}

// Prepara a query SQL para inserir o registro
$stmt = $conexao->prepare("INSERT INTO pet (nome, sexo, especie, raca, cor, idade, porte, rga, foto_pet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Obtém os valores do formulário
$nome = $_POST['txtNome'];
$sexo = $_POST['txtSexo'];
$especie = $_POST['txtEspecie'];
$raca = $_POST['txtRaca'];
$cor = $_POST['txtCor'];
$idade = $_POST['txtIdade'];
$porte = $_POST['txtPorte'];
$rga = $_POST['txtRga'];

// Verifica se há uma imagem enviada
if (isset($_FILES['foto_pet']) && $_FILES['foto_pet']['error'] == 0) {
    // Lê o conteúdo da imagem em binário
    $foto_pet = file_get_contents($_FILES['foto_pet']['tmp_name']);

    // Associa os parâmetros ao comando SQL
    $stmt->bind_param("sssssisss", $nome, $sexo, $especie, $raca, $cor, $idade, $porte, $rga, $foto_pet);

    // Executa a query e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Cadastro de pet realizado com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $conexao->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nenhuma imagem foi enviada ou ocorreu um erro.']);
}

// Fecha a conexão
$stmt->close();
$conexao->close();
?>
