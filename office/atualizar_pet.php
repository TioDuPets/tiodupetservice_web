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
    <title>Atualizar Pet</title>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">
            <h1 class="text-center">Atualizar Pet ID: <?php echo $_GET['id']; ?></h1>
            <form action="atualizarAction_pet.php" method="post">
                
		<input name="txtID" class="" type="hidden" value="<?php echo $_GET['id'] ?>">
		<br>
                <label for="txtNome">Nome Pet</label>
                <input name="txtNome" value="<?php echo $_GET['nome']; ?>">

                <div class="form-content">
                    <label>Sexo</label>
                    <input name="txtSexo" value="<?php echo $_GET['sexo']; ?>">

                    <label>Espécie</label>
                    <input name="txtEspecie" value="<?php echo $_GET['especie']; ?>">
                </div>

                <div class="form-content">
                    <label>Raça</label>
                    <input name="txtRaca" value="<?php echo $_GET['raca']; ?>">

                    <label>Cor</label>
                    <input name="txtCor" value="<?php echo $_GET['cor']; ?>">
                </div>

                <div class="form-content">
                    <label>Idade</label>
                    <input name="txtIdade" value="<?php echo $_GET['idade']; ?>">

                    <label>Porte</label>
                    <input name="txtPorte"value="<?php echo $_GET['porte']; ?>">
                </div>

                <label>RGA</label>
                <input name="txtRga" value="<?php echo $_GET['rga']; ?>">

		<button name="btnAtualizar" class=""><i class="fa fa-paw"></i> Atualizar</button>

            </form>
        </div>
    </div>
</section>

</body>
</html>
