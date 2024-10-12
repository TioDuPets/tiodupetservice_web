<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Cria a conexão com o banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Inicializa a resposta
$response = [];

// Atualiza os dados do pet no banco de dados
$sql = "UPDATE pet SET 
            nome = '" . $conexao->real_escape_string($_POST['txtNome']) . "',
            sexo = '" . $conexao->real_escape_string($_POST['txtSexo']) . "',
            especie = '" . $conexao->real_escape_string($_POST['txtEspecie']) . "',
            raca = '" . $conexao->real_escape_string($_POST['txtRaca']) . "',
            cor = '" . $conexao->real_escape_string($_POST['txtCor']) . "',
            idade = '" . (int)$_POST['txtIdade'] . "',
            porte = '" . $conexao->real_escape_string($_POST['txtPorte']) . "',
            rga = '" . $conexao->real_escape_string($_POST['txtRga']) . "' 
        WHERE id = " . (int)$_POST['txtID'] . ";";

if ($conexao->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Pet atualizado com sucesso!';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Erro ao atualizar pet: ' . $conexao->error;
}

// Verifica se um novo arquivo de imagem foi enviado
if (isset($_FILES['foto_pet']) && $_FILES['foto_pet']['error'] == 0) {
    // Lê o conteúdo da imagem em binário
    $foto_pet = file_get_contents($_FILES['foto_pet']['tmp_name']);

    // Atualiza o nome da foto no banco de dados, salvando a imagem em binário
    $pet_id = (int)$_POST['txtID'];
    $sql_foto = "UPDATE pet SET foto_pet = ? WHERE id = ?";
    
    // Prepara a declaração
    $stmt_foto = $conexao->prepare($sql_foto);
    $stmt_foto->bind_param("bi", $foto_pet, $pet_id); // 'b' para binary e 'i' para integer
    
    // Executa a declaração e verifica se foi bem-sucedida
    if ($stmt_foto->execute()) {
        $response['message'] .= ' Foto do pet atualizada com sucesso!';
    } else {
        $response['message'] .= ' Erro ao atualizar a foto no banco de dados: ' . $conexao->error;
    }
    
    // Fecha a declaração da foto
    $stmt_foto->close();
}

// Fecha a conexão
$conexao->close();

// Retorna a resposta em JSON
echo json_encode($response);
?>
