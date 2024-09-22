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

	<div class="">
		<h1 class="">EXCLUIR:
			<?php echo " " . $_GET['id'] ?>
		</h1>
		<form action="excluirAction_pet.php" class="" method='post'>
			<input name="txtID" class="" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
			<label class="" >Nome</label>
			<input name="txtNome" class="" disabled value="<?php echo $_GET['nome'] ?>">
			<br>
			<label class="" >Sexo</label>
			<input name="txtApelido" class="" disabled value="<?php echo $_GET['sexo'] ?>">
			<br>
			<label class="" >Espécie</label>
			<input name="txtEmail" class="" disabled value="<?php echo $_GET['especie'] ?>">
			<br>

            <div class="form-content">
			<a href="main.php" class=""	style="text-decoration:none; ">	<i class="fa fa-ban" style="font-size:5em"></i>
		<p style="font-weight:bold;">CANCELAR EXCLUSÃO</p>

			<button name="btnExcuir" class="">
				<i class="fa fa-check"></i> Confirmar Exclusão.
			</button>
</div>
		</form>
	</div>
</body>
</html>