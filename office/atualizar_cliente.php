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
    <title>Atualizar Cliente</title>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">

        <h1 class="text-center">Atualizar Cliente - ID:<?php echo " " . $_GET['id'] ?></h1>
		<form action="atualizarAction_cliente.php" method='post'>

			<input name="txtID" type="hidden" value="<?php echo $_GET['id'] ?>">
			<br>
            <div class="form-content">
			<label type="text">Nome Cliente</label>
			<input name="txtNome"  value="<?php echo $_GET['nome'] ?>">

			<label type="text">CPF</label>
			<input name="txtCpf"  value="<?php echo $_GET['cpf'] ?>">
			<br>
			</div>
			<div class="form-content">
			<br>
			<label type="text">Telefone</label>
			<input name="txtTelefone"  value="<?php echo $_GET['telefone'] ?>">

			<label type="text">Email</label>
			<input name="txtEmail"  value="<?php echo $_GET['email'] ?>">
			<br>
			</div>
			<div class="form-content">
			<br>
			<label type="text">Endereco</label>
			<input name="txtEndereco"  value="<?php echo $_GET['endereco'] ?>">

			<label type="number">Numero</label>
			<input name="txtNumero"  value="<?php echo $_GET['numero'] ?>">

			<label type="text">Complemento</label>
			<input name="txtComplemento"  value="<?php echo $_GET['complemento'] ?>">
			<br>
			</div>
			<div class="form-content">
			<br>
            <label type="text">Bairro</label>
			<input name="txtBairro" value="<?php echo $_GET['bairro'] ?>">

			<label type="text">CEP</label>
			<input name="txtCep" value="<?php echo $_GET['cep'] ?>">
			<br>
			</div>
			<div class="form-content">
			<br>
            <label type="text">Cidaee</label>
			<input name="txtCidade" value="<?php echo $_GET['cidade'] ?>">

			<label type="text">Estado</label>
			<input name="txtEstado" value="<?php echo $_GET['estado'] ?>">
			<br>
            </div>

			<button name="btnCancelar"><a href="listar_cliente.php">
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
