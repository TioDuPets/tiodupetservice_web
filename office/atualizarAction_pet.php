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
	<title>Atualização</title>
</head>
<body>
	<div class="">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_tiodupetservice";
		$conexao = new mysqli($servername, $username, $password, $dbname);
		if ($conexao->connect_error) {
			die("Connection failed: " . $conexao->connect_error);
		}
		$sql = "UPDATE pet SET nome = '" . $_POST['txtNome'] . "', sexo = '" . $_POST['txtSexo'] . "', especie = '" . $_POST['txtEspecie'] . "', raca = '" . $_POST['txtRaca'] . "', cor = '" . $_POST['txtCor'] . "', idade = '" . $_POST['txtIdade'] . "', porte '" . $_POST['txtPorte'] . "', rga = '" . $_POST['txtRga'] . "' WHERE id =" . $_POST['txtID'] . ";";
		if ($conexao->query($sql) === TRUE) {
			echo ' 
						<a href="listar_pet.php"> <h1 class="">Pet Atualizado com sucesso! </h1> </a>
						';
			$id = mysqli_insert_id($conexao);
		} else {
			echo ' 
							<a href="listar_pet.php"> <h1 class="">ERRO! </h1> </a>
							 ';
		}
		$conexao->close();
		?>
	</div>
</body>
</html>