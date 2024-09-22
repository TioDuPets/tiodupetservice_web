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
		$conexao = new mysqli($servername, $username, $password, $dbname);
		if ($conexao->connect_error) {
			die("Connection failed: " . $conexao->connect_error);
		}
		$sql = "UPDATE servico SET servico = '" . $_POST['txtServico'] . "',
								tipo = '" . $_POST['txtTipo'] . "',
								preco = '" . $_POST['txtPreco'] . "'
									WHERE id =" . $_POST['txtID'] . ";";
		if ($conexao->query($sql) === TRUE) {
			echo ' 
						<a href="listar_servico.php"> <h1>Serviço Atualizado com sucesso! </h1> </a> 
						';
			$id = mysqli_insert_id($conexao);
		} else {
			echo ' 
							<a href="listar_servico.php"> <h1>ERRO! </h1> </a>
							 ';
		}
		$conexao->close();
		?>
	</div>
</body>
</html>