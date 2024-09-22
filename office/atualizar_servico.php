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
    <title>Atualizar Serviço</title>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">

        <h1 class="text-center">Atualizar Serviço - ID:<?php echo " " . $_GET['id'] ?></h1>
		<form action="atualizarAction_servico.php" method='post'>

			<input name="txtID" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
            <div class="form-content">
			<label type="text">Serviço</label>
			<input name="txtServico"  value="<?php echo $_GET['servico'] ?>">
			<br>
            </div>
            <div class="form-content">
			<label type="text">Tipo</label>
			<input name="txtTipo"  value="<?php echo $_GET['tipo'] ?>">
			<br>
			<label type="text">Preço</label>
			<input name="txtPreco"  value="<?php echo $_GET['preco'] ?>">
			<br>
            </div>
           
            <button name="btnCancelar"><a href="listar_servico.php">
				<i class="fa fa-ban"></i> Cancelar Atualização.</a>
				</button>

			<button name="btnAtualizar" >
				<i class="fa fa-wrench"></i> Atualizar
			</button>

            </form>
        </div>
    </div>
</section>

</body>
</html>
