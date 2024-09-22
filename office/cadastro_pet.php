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
	<title>Cadastro Pet</title>


</head>
<body>

<section>
<div class="container-centered">
    <div class="form-container">
        <h1 class="text-center">Cadastro de Pet</h1>
        <form action="cadastroAction_pet.php" method="post">
            <label for="txtID"></label>
            <input type="text" name="txtID" id="txtID" hidden>

            <div class="form-content">
                <label for="txtNome">Nome Pet</label>
                <input type="text" name="txtNome" id="txtNome" required>

                <label for="txtRga">RGA</label>
                <input type="text" name="txtRga" id="txtRga">
            </div>

            <div class="form-content">
                <label for="txtSexo">Sexo</label>
                <input type="text" name="txtSexo" id="txtSexo" required>

                <label for="txtEspecie">Espécie</label>
                <input type="text" name="txtEspecie" id="txtEspecie" required>
            </div>

            <div class="form-content">
                <label for="txtRaca">Raça</label>
                <input type="text" name="txtRaca" id="txtRaca">

                <label for="txtCor">Cor</label>
                <input type="text" name="txtCor" id="txtCor">
            </div>

            <div class="form-content">
                <label for="txtIdade">Idade</label>
                <input type="number" name="txtIdade" id="txtIdade">

                <label for="txtPorte">Porte</label>
                <input type="text" name="txtPorte" id="txtPorte">
            </div>

            <button type="submit" class="botao"><i class="fa fa-paw"></i> Adicionar</button>
        </form>
    </div>
</div>

</section>
</body>
</html>
