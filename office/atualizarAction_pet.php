<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Atualizar</title>
</head>
<body>
    <div>
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

        // Atualiza os dados do pet no banco de dados
        $sql = "UPDATE pet SET 
                    nome = '" . $_POST['txtNome'] . "',
                    sexo = '" . $_POST['txtSexo'] . "',
                    especie = '" . $_POST['txtEspecie'] . "',
                    raca = '" . $_POST['txtRaca'] . "',
                    cor = '" . $_POST['txtCor'] . "',
                    idade = '" . $_POST['txtIdade'] . "',
                    porte = '" . $_POST['txtPorte'] . "',
                    rga = '" . $_POST['txtRga'] . "' 
                WHERE id = " . $_POST['txtID'] . ";";

        if ($conexao->query($sql) === TRUE) {
            echo '<a href="listar_pet.php"><h1>Pet Atualizado com sucesso!</h1></a>';
        } else {
            echo '<a href="listar_pet.php"><h1>ERRO!</h1></a>';
        }

        // Verifica se um novo arquivo de imagem foi enviado
        if (isset($_FILES['foto_pet']) && $_FILES['foto_pet']['error'] == 0) {
            // Define o diretório de destino e o nome do arquivo
            $target_dir = "uploads/";
            $pet_id = $_POST['txtID'];
            $extensao = strtolower(pathinfo($_FILES['foto_pet']['name'], PATHINFO_EXTENSION));
            $novo_nome_foto = "pet_" . $pet_id . "." . $extensao;
            $target_file = $target_dir . $novo_nome_foto;

            // Verifica se o arquivo é uma imagem válida
            $check = getimagesize($_FILES["foto_pet"]["tmp_name"]);
            if ($check !== false) {
                // Move o arquivo para a pasta 'uploads' e renomeia com 'pet_ID.extensão'
                if (move_uploaded_file($_FILES["foto_pet"]["tmp_name"], $target_file)) {
                    // Atualiza o nome do arquivo no banco de dados
                    $sql_foto = "UPDATE pet SET foto_pet = '" . $novo_nome_foto . "' WHERE id = " . $pet_id;
                    if ($conexao->query($sql_foto) === TRUE) {
                        echo '<p>Foto do pet atualizada com sucesso!</p>';
                    } else {
                        echo '<p>Erro ao atualizar a foto no banco de dados: ' . $conexao->error . '</p>';
                    }
                } else {
                    echo '<p>Erro ao mover o arquivo para o diretório de uploads.</p>';
                }
            } else {
                echo '<p>Arquivo enviado não é uma imagem válida.</p>';
            }
        }

        $conexao->close();
        ?>
    </div>
</body>
<?php
include 'footer.php';
?>
</html>
