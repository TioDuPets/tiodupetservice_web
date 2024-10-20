<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão falhou
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebendo os dados do formulário
$nome = $_POST['txtNome'];
$sexo = $_POST['txtSexo'];
$especie = $_POST['txtEspecie'];
$raca = $_POST['txtRaca'];
$cor = $_POST['txtCor'];
$idade = $_POST['txtIdade'];
$porte = $_POST['txtPorte'];
$rga = $_POST['txtRga'];
$id_cliente = $_POST['id_cliente'];
$id_veterinario = $_POST['id_veterinario'];

// Upload da foto do pet
$foto_pet = $_FILES['foto_pet']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["foto_pet"]["name"]);

if (move_uploaded_file($_FILES["foto_pet"]["tmp_name"], $target_file)) {
    // Inserir dados no banco
    $sql = "INSERT INTO pet (nome, sexo, especie, raca, cor, idade, porte, rga, foto_pet, id_cliente, id_veterinario)
            VALUES ('$nome', '$sexo', '$especie', '$raca', '$cor', '$idade', '$porte', '$rga', '$foto_pet', '$id_cliente', '$id_veterinario')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Novo pet cadastrado com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao cadastrar o pet: " . $conn->error]);
}
} else {
echo json_encode(["status" => "error", "message" => "Erro no upload da foto."]);
}

$conn->close();
?>
