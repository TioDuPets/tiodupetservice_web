<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cadastro Pet</title>
</head>
<body>
	<a href="cadastro.php" class="w3-display-topleft">
		<i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-xxlarge"></i>
	</a>

	<div class="w3-padding w3-content w3-text-grey w3-third w3-display-container w3-margin w3-display-topmiddle">
		<h1 class="w3-center w3-teal w3-round-large w3-margin">Cadastro de Pet</h1>
		<form action="cadastroAction_pet.php" class="w3-container" method='post'>
			
			<label class="w3-text-teal" style="font-weight: bold;">Código</label>
			<input name="txtID" class="w3-input w3-grey w3-border" disabled><br>

			<label class="w3-text-teal" style="font-weight: bold;">Nome Pet</label>
			<input name="txtNome" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Sexo</label>
			<input name="txtSexo" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Espécie</label>
			<input name="txtEspecie" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Raça</label>
			<input name="txtRaca" class="w3-input w3-light-grey w3-border"><br>

			<label class="w3-text-teal" style="font-weight: bold;">Cor</label>
			<input name="txtCor" class="w3-input w3-light-grey w3-border"><br>

			<label class="w3-text-teal" style="font-weight: bold;">Idade</label>
			<input name="txtIdade" class="w3-input w3-light-grey w3-border" type="number"><br>

			<label class="w3-text-teal" style="font-weight: bold;">Porte</label>
			<input name="txtPorte" class="w3-input w3-light-grey w3-border"><br>

			<label class="w3-text-teal" style="font-weight: bold;">RGA</label>
			<input name="txtRga" class="w3-input w3-light-grey w3-border"><br>

			<label class="w3-text-teal" style="font-weight: bold;">Endereço</label>
			<input name="txtEndereco" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Número</label>
			<input name="txtNumero" class="w3-input w3-light-grey w3-border" type="number"><br>

			<label class="w3-text-teal" style="font-weight: bold;">Complemento</label>
			<input name="txtComplemento" class="w3-input w3-light-grey w3-border"><br>

			<label class="w3-text-teal" style="font-weight: bold;">Bairro</label>
			<input name="txtBairro" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">CEP</label>
			<input name="txtCep" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Cidade</label>
			<input name="txtCidade" class="w3-input w3-light-grey w3-border" required><br>

			<label class="w3-text-teal" style="font-weight: bold;">Estado</label>
			<input name="txtEstado" class="w3-input w3-light-grey w3-border" required><br>

			<button name="btnAdicionar" class="w3-button w3-teal w3-cell w3-round-large w3-right w3-margin-right">
				<i class="w3-xxlarge fa fa fa-paw"></i> Adicionar
			</button>
		</form>
	</div>
</body>
</html>
