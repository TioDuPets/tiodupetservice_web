<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Agendamento</title>
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
		$sql = "INSERT INTO lead (servico, data_lead, nome, telefone, email, lead_contatado) VALUES ('" . $_POST['serviceTypeInput'] . "','" . $_POST['selectedDate'] . "','" . $_POST['txtNome'] . "', '" . $_POST['txtTelefone'] . "', '" . $_POST['txtEmail'] . "', '" . $_POST['lead_contatado'] . "')";
		if ($conexao->query($sql) === TRUE) {
			echo ' 
							<a href="index.php"> 
							<h1 class="">Agendamento efetuado com sucesso! </h1> </a> ';
		} else {
			echo '
							 <a href="index.php">
							 <h1 class="">ERRO! </h1>
							  </a> 
							  ';
		}
		$conexao->close();
		?>
	</div>
</body>
</html>