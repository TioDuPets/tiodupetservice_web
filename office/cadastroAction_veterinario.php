<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro de Veterinário</title>
</head>
<body>
	<div class="">
		<?php $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_tiodupetservice";
		$conexao = new mysqli($servername, $username, $password, $dbname);
		if ($conexao->connect_error) {
			die("Connection failed: " . $conexao->connect_error);
		}
		$sql = "INSERT INTO veterinario (nome, telefone, email, endereco, numero, complemento, bairro, cep, cidade, estado) VALUES ('" . $_POST['txtNome'] . "', '" . $_POST['txtTelefone'] . "', '" . $_POST['txtEmail'] . "', '" . $_POST['txtEndereco'] . "', '" . $_POST['txtNumero'] . "', '" . $_POST['txtComplemento'] . "', '" . $_POST['txtBairro'] . "', '" . $_POST['txtCep'] . "', '" . $_POST['txtCidade'] . "', '" . $_POST['txtEstado'] . "')";
		if ($conexao->query($sql) === TRUE) {
			echo ' 
							<a href="main.php"> 
							<h1 class="">Veterinário Salvo com sucesso! </h1> </a> ';
		} else {
			echo '
							 <a href="main.php">
							 <h1 class="">ERRO! </h1>
							  </a> 
							  ';
		}
		$conexao->close();
		?>
	</div>
</body>
<?php
include 'footer.php';
?>
</html>