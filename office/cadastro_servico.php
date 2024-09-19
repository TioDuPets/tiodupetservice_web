<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro Serviço</title>


</head>
<body>
	<div class="">
		<h1 class="">Cadastro de Serviço</h1>
		<form action="cadastroAction_servico.php" class="" method='post'>
			
			<label class="" style="font-weight: bold;">Código</label>
			<input name="txtID" class="" disabled><br>

			<label class="" style="font-weight: bold;">Nome do Serviço</label>
			<input name="txtNome" class="" required><br>

			<label class="" style="font-weight: bold;">Tipo</label>
			<input name="txtTipo" class="" required><br>

			<label class="" style="font-weight: bold;">Preco</label>
			<input name="txtPreco" class="" required><br>

			<button name="btnAdicionar" class="">
				<i class="fa fa-wrench"></i> Adicionar
			</button>
		</form>
	</div>
</body>
</html>