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
	<title>Excluir Veterinário</title>
</head>
<body>

	<section>
      <div class="container-centered">
        <div class="form-container">

                            <h1 class="text-center">EXCLUIR VETERINÁRIO:<?php echo " " . $_GET['id'] ?></h1>

		<form action="excluirAction_veterinario.php" method='post'>
			<input name="txtID" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
			<label >Nome</label>
			<input name="txtNome" disabled value="<?php echo $_GET['nome'] ?>">
			<br>
			<label >Telefone</label>
			<input name="txtTelefone" disabled value="<?php echo $_GET['telefone'] ?>">
			<br>
			<label >Email</label>
			<input name="txtEmail" disabled value="<?php echo $_GET['email'] ?>">
			<br>

            <div class="form-content">
				<button name="btnCancelar"><a href="listar_veterinario.php">
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