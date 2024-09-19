<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro Veterinário</title>
</head>

<body>
	<div>
		<h1 class="w">Cadastro de Veterinário</h1>
		<form action="cadastroAction_veterinario.php" class="" method='post'>
		<label class="" style="font-weight: bold;">Código</label>
			<input name="txtID" class="" disabled><br>

			<label class="" style="font-weight: bold;">Nome Veterinário</label>
			<input name="txtNome" class="" required><br>

			<label class="" style="font-weight: bold;">Telefone</label>
			<input name="txtTelefone" class="" required><br>

			<label class="" style="font-weight: bold;">Email</label>
			<input name="txtEmail" class="" required><br>

			<label class="" style="font-weight: bold;">Endereço</label>
			<input name="txtEndereco" class="" required><br>

			<label class="" style="font-weight: bold;">Número</label>
			<input name="txtNumero" class="" type="number"><br>

			<label class="" style="font-weight: bold;">Complemento</label>
			<input name="txtComplemento" class=""><br>

			<label class="" style="font-weight: bold;">Bairro</label>
			<input name="txtBairro" class="" required><br>

			<label class="" style="font-weight: bold;">CEP</label>
			<input name="txtCep" class="" required><br>

			<label class="" style="font-weight: bold;">Cidade</label>
			<input name="txtCidade" class="" required><br>

			<label class="" style="font-weight: bold;">Estado</label>
			<input name="txtEstado" class="" required><br>

			<button name="btnAdicionar" class="">
				<i class="fa fa-ambulance"></i> Adicionar
			</button>
		</form>
	</div>