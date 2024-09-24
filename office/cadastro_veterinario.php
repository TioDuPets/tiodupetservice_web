<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="officestyle.css">
	<title>Cadastro Veterinário</title>
</head>

<body>
		<div class="container-centered">
			<div class="form-container">
				<h1 class="text-center">Cadastro de Veterinário</h1>
				<form action="cadastroAction_veterinario.php" method="post">
					<input type="text" name="txtID" hidden>

					<div class="form-content">
						<label for="txtNome">Nome Veterinário</label>
						<input type="text" name="txtNome" id="txtNome" required>
					</div>

					<div class="form-content">
						<label for="txtTelefone">Telefone</label>
						<input type="text" name="txtTelefone" id="txtTelefone" required>

						<label for="txtEmail">Email</label>
						<input type="email" name="txtEmail" id="txtEmail" required>
					</div>

					<div class="form-content">
						<label for="txtEndereco">Endereço</label>
						<input type="text" name="txtEndereco" id="txtEndereco" required>

						<label for="txtNumero">Número</label>
						<input type="number" name="txtNumero" id="txtNumero">

						<label for="txtComplemento">Complemento</label>
						<input type="text" name="txtComplemento" id="txtComplemento">
					</div>

					<div class="form-content">
						<label for="txtBairro">Bairro</label>
						<input type="text" name="txtBairro" id="txtBairro" required>

						<label for="txtCep">CEP</label>
						<input type="text" name="txtCep" id="txtCep" required>
					</div>

					<div class="form-content">
						<label for="txtCidade">Cidade</label>
						<input type="text" name="txtCidade" id="txtCidade" required>

						<label for="txtEstado">Estado</label>
						<input type="text" name="txtEstado" id="txtEstado" required>
					</div>

					<button type="submit"><i class="fa fa-ambulance"></i> Adicionar</button>

				</form>
			</div>
		</div>
</body>