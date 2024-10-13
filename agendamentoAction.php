		<?php
		
		$servername = "localhost";
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