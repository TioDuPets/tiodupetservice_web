<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro Cliente</title>
</head>

<body>
	<div>
		<h1 class="w3-center w3-teal w3-round-large w3-margin">Cadastro de Cliente</h1>
		<form action="cadastroAction_cliente.php" class="w3-container" method='post'>
		<label class="w3-text-teal" style="font-weight: bold;">Código</label>
			<input name="txtID" class="w3-input w3-grey w3-border" disabled><br>

			<label class="w3-text-teal" style="font-weight: bold;">Nome Cliente</label>
			<input name="txtNome" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">CPF</label>
			<input name="txtCpf" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Telefone</label>
			<input name="txtTelefone" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Email</label>
			<input name="txtEmail" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">ID do Pet</label>
			<input name="txtPetID" class="w3-input w3-light-grey w3-border" required><br>

			<button name="btnAdicionar" class="w3-button w3-teal w3-cell w3-round-large w3-right w3-margin-right">
				<i class="w3-xxlarge fa fa-user-plus"></i> Adicionar
			</button>
		</form>
	</div>