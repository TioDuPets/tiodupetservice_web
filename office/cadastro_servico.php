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
	<title>Cadastro Serviço</title>

</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-6 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Serviço</h1>
        
        <form action="cadastroAction_servico.php" method="post">
            
            <!-- Campo oculto ID -->
            <input type="text" name="txtID" id="txtID" hidden>

            <!-- Serviço, Tipo e Preço -->
            <div class="row mb-1">
                <div class="col-md-12">
                    <label for="txtServico" class="form-label">Serviço</label>
                    <input type="text" name="txtServico" id="txtServico" class="form-control" required>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtTipo" class="form-label">Tipo</label>
                    <input type="text" name="txtTipo" id="txtTipo" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtPreco" class="form-label">Preço</label>
                    <input type="text" name="txtPreco" id="txtPreco" class="form-control" required>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-wrench"></i> Adicionar
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