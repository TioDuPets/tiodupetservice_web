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
	<title>Cadastro Serviço</title>

</head>
<body>
<div class="container-centered"> 
		<div class="form-container">
			<h1 class="text-center">Cadastro de Serviço</h1>

        		<form action="cadastroAction_servico.php" method="post">
          		  <label for="txtID"></label>
	          		<input type="text" name="txtID" id="txtID" hidden>

					<div class="form-content">
						<label for="txtServico">Servico</label>
						<input type="text" name="txtServico" id="txtServico" required>

                		<label for="txtTipo">Tipo</label>
                		<input type="text" name="txtTipo" id="txtTipo" required>

						<label for="txtPreco">Preço</label>
						<input type="text" name="txtPreco" id="txtPreco" required>
					</div>

				<button type="submit"><i class="fa fa-wrench"></i> Adicionar</button>
			</form>
		</div>
	</div>

</body>
</html>