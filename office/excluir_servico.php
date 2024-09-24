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
	<title>Excluir Serviço</title>
</head>
<body>

	<section>
      <div class="container-centered">
        <div class="form-container">

                            <h1 class="text-center">EXCLUIR SERVIÇO:<?php echo " " . $_GET['id'] ?></h1>

		<form action="excluirAction_servico.php" method='post'>
			<input name="txtID" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
			<label >Serviço</label>
			<input name="txtServico" disabled value="<?php echo $_GET['servico'] ?>">
			<br>
			<label >Tipo</label>
			<input name="txtTipo" disabled value="<?php echo $_GET['tipo'] ?>">
			<br>
			<label >Preço</label>
			<input name="txtPreco" disabled value="<?php echo $_GET['preco'] ?>">
			<br>

            <div class="form-content">
				<button name="btnCancelar"><a href="listar_servico.php">
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