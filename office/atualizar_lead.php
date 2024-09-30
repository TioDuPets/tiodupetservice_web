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
    <title>Atualizar Lead</title>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">

        <h1 class="text-center">Atualizar Lead - ID:<?php echo " " . $_GET['id'] ?></h1>
		<form action="atualizarAction_lead.php" method='post'>

			<input name="txtID" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
            <div class="form-content">

			<label type="text">Serviço</label>
			<input name="serviceTypeInput"  value="<?php echo $_GET['servico'] ?>">

			<label type="text">Data Solicitada</label>
			<input name="selectedDate"  value="<?php echo $_GET['data_lead'] ?>">

			<br>
			</div>
            <div class="form-content">
			<label type="text">Nome Cliente</label>
			<input name="txtNome"  value="<?php echo $_GET['nome'] ?>">

			<label type="text">Telefone</label>
			<input name="txtTelefone"  value="<?php echo $_GET['telefone'] ?>">

			<label type="text">Email</label>
			<input name="txtEmail"  value="<?php echo $_GET['email'] ?>">
			<br>
			</div>

            <div class="form-content">

			<label type="text">Lead contatado?</label>
			<input name="lead_contatado"  value="<?php echo $_GET['lead_contatado'] ?>">
			</div>

			<br>

			<button name="btnCancelar"><a href="listar_lead.php">
				<i class="fa fa-ban"></i> Cancelar Atualização.</a>
				</button>

			<button name="btnAtualizar" >
				<i class="fa fa-user"></i> Atualizar
			</button>

            </form>
        </div>
    </div>
</section>

</body>
<?php
include 'footer.php';
?>
</html>
