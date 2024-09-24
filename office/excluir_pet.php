<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="officestyle.css">
	<title>Excluir</title>
</head>
<body>

	<section>
      <div class="container-centered">
        <div class="form-container">

                            <h1 class="text-center">EXCLUIR PET:<?php echo " " . $_GET['id'] ?></h1>

		<form action="excluirAction_pet.php" method='post'>
			<input name="txtID" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
			<div class="form-content">
			<label >Nome</label>
			<input name="txtNome" disabled value="<?php echo $_GET['nome'] ?>">
			<br>
			<label >Sexo</label>
			<input name="txtApelido" disabled value="<?php echo $_GET['sexo'] ?>">
			<br>
			<label >Espécie</label>
			<input name="txtEspecie" disabled value="<?php echo $_GET['especie'] ?>">
			<br>
</div>

            <div class="form-content">
				<button name="btnCancelar"><a href="listar_pet.php">
				<i class="fa fa-ban"></i> Cancelar Exclusão.</a>
				</button>

				<button name="btnExcuir">
				<i class="fa fa-check"></i> Confirmar Exclusão.
				</button>
		</div>
		</form>
		</div>
		</div>
</section>
</body>
</html>