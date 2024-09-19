<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro Pet</title>


</head>
<body>
	<div class="">
		<h1 class="">Cadastro de Pet</h1>
		<form action="cadastroAction_pet.php" class="" method='post'>
			
			<label class="" style="font-weight: bold;">Código</label>
			<input name="txtID" class="" disabled><br>

			<label class="" style="font-weight: bold;">Nome Pet</label>
			<input name="txtNome" class="" required><br>

			<label class="" style="font-weight: bold;">Sexo</label>
			<input name="txtSexo" class="" required><br>

			<label class="" style="font-weight: bold;">Espécie</label>
			<input name="txtEspecie" class="" required><br>

			<label class="" style="font-weight: bold;">Raça</label>
			<input name="txtRaca" class=""><br>

			<label class="" style="font-weight: bold;">Cor</label>
			<input name="txtCor" class=""><br>

			<label class="" style="font-weight: bold;">Idade</label>
			<input name="txtIdade" class="" type="number"><br>

			<label class="" style="font-weight: bold;">Porte</label>
			<input name="txtPorte" class=""><br>

			<label class="" style="font-weight: bold;">RGA</label>
			<input name="txtRga" class=""><br>

			<button name="btnAdicionar" class="">
				<i class="fa fa-paw"></i> Adicionar
			</button>
		</form>
	</div>
</body>
</html>
