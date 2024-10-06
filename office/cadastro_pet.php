<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="officestyle.css">
	<title>Cadastro Pet</title>
</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-6 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Pet</h1>
        <form action="cadastroAction_pet.php" method="post" enctype="multipart/form-data">

            <!-- Campo oculto ID -->
            <input type="text" name="txtID" id="txtID" hidden>

            <!-- Nome e RGA -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtNome" class="form-label">Nome do Pet</label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" required>
                </div>
                <div class="col-md-6">
                    <label for="txtRga" class="form-label">RGA</label>
                    <input type="text" class="form-control" name="txtRga" id="txtRga">
                </div>
            </div>

            <!-- Sexo e Espécie -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtSexo" class="form-label">Sexo</label>
                    <input type="text" class="form-control" name="txtSexo" id="txtSexo" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEspecie" class="form-label">Espécie</label>
                    <input type="text" class="form-control" name="txtEspecie" id="txtEspecie" required>
                </div>
            </div>

            <!-- Raça e Cor -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtRaca" class="form-label">Raça</label>
                    <input type="text" class="form-control" name="txtRaca" id="txtRaca">
                </div>
                <div class="col-md-6">
                    <label for="txtCor" class="form-label">Cor</label>
                    <input type="text" class="form-control" name="txtCor" id="txtCor">
                </div>
            </div>

            <!-- Idade e Porte -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtIdade" class="form-label">Idade</label>
                    <input type="number" class="form-control" name="txtIdade" id="txtIdade">
                </div>
                <div class="col-md-6">
                    <label for="txtPorte" class="form-label">Porte</label>
                    <input type="text" class="form-control" name="txtPorte" id="txtPorte">
                </div>
            </div>

            <div class="form-group mb-3">
    <label for="foto_pet" class="form-label">Foto do Pet</label>
    <div class="input-group">
        <input type="file" class="form-control" name="foto_pet" id="foto_pet" accept="image/*" required>
        <label class="input-group-text" for="foto_pet">
            <i class="fa fa-upload"></i>
        </label>
    </div>
</div>
            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-paw"></i> Adicionar
                </button>
            </div>
        </form>
    </div>
</div>

</body>
<?php
include 'footer.php';
?>
</html>
