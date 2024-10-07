<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro de Pets</title>
</head>
<body>
	<div class="">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_tiodupetservice";

		// Cria a conexão
		$conexao = new mysqli($servername, $username, $password, $dbname);

		// Verifica se há erros na conexão
		if ($conexao->connect_error) {
			die("Connection failed: " . $conexao->connect_error);
		}

		// Primeiro, insere os dados sem a imagem para obter o ID gerado
		$sql = "INSERT INTO pet (nome, sexo, especie, raca, cor, idade, porte, rga) VALUES (
			'" . $_POST['txtNome'] . "',
			'" . $_POST['txtSexo'] . "',
			'" . $_POST['txtEspecie'] . "',
			'" . $_POST['txtRaca'] . "',
			'" . $_POST['txtCor'] . "',
			'" . $_POST['txtIdade'] . "',
			'" . $_POST['txtPorte'] . "',
			'" . $_POST['txtRga'] . "')";

		// Verifica se a inserção foi bem-sucedida
		if ($conexao->query($sql) === TRUE) {
			// Obtém o último ID inserido
			$pet_id = $conexao->insert_id;
			$pet_nome = $_POST['txtNome'];
		} else {
			echo '<h1 class="">ERRO ao salvar no banco de dados: ' . $conexao->error . '</h1>';
			exit();
		}

		// Agora faz o upload da imagem
		$uploadOk = 1;
		$target_dir = "uploads/";
		$foto_nome = "";

		if (isset($_FILES['foto_pet']) && $_FILES['foto_pet']['error'] == 0) {
			// Define o novo nome da imagem: pet_ID (ex: pet_01.jpg)
			$imageFileType = strtolower(pathinfo($_FILES['foto_pet']['name'], PATHINFO_EXTENSION));
			$novo_nome_foto = "pet_" . $pet_id . "." . $imageFileType;
			$target_file = $target_dir . $novo_nome_foto;

			// Verifica se o arquivo é uma imagem
			$check = getimagesize($_FILES['foto_pet']['tmp_name']);
			if ($check !== false) {
				echo "Arquivo é uma imagem - " . $check["mime"] . ".<br>";
			} else {
				echo "Arquivo não é uma imagem.<br>";
				$uploadOk = 0;
			}

			// Verifica o tamanho do arquivo (limite de 2MB)
			if ($_FILES['foto_pet']['size'] > 2000000) {
				echo "Desculpe, o arquivo é muito grande. Tamanho máximo permitido: 2MB.<br>";
				$uploadOk = 0;
			}

			// Limita os formatos permitidos
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
				echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.<br>";
				$uploadOk = 0;
			}

			// Verifica se o upload foi permitido e move o arquivo
			if ($uploadOk == 1) {
				if (move_uploaded_file($_FILES['foto_pet']['tmp_name'], $target_file)) {
					echo "O arquivo foi enviado com sucesso.<br>";

					// Atualiza o registro do pet com o nome da imagem
					$sql_update = "UPDATE pet SET foto_pet = '$novo_nome_foto' WHERE id = $pet_id";
					if ($conexao->query($sql_update) === TRUE) {
						echo '<a href="main.php"><h1 class="">Pet salvo com sucesso!</h1></a>';
					} else {
						echo "Erro ao atualizar o registro com a imagem: " . $conexao->error . "<br>";
					}
				} else {
					echo "Desculpe, houve um erro ao enviar sua imagem.<br>";
				}
			}
		} else {
			echo "Nenhuma imagem enviada ou ocorreu um erro durante o envio.<br>";
		}

		// Fecha a conexão
		$conexao->close();
		?>
	</div>
</body>
</html>
