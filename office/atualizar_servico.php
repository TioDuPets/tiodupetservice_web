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
    <title>Atualizar Serviço</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Atualizar Serviço - ID: <?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?></h1>

        <form action="atualizarAction_servico.php" method="post">
            <input name="txtID" type="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

            <!-- Campo Serviço -->
            <div class="form-content mb-3">
                <label for="txtServico">Serviço</label>
                <input name="txtServico" id="txtServico" type="text" class="form-control" value="<?php echo isset($_GET['servico']) ? htmlspecialchars($_GET['servico']) : ''; ?>" required>
            </div>

            <!-- Campo Tipo -->
            <div class="form-content mb-3">
                <label for="txtTipo">Tipo</label>
                <input name="txtTipo" id="txtTipo" type="text" class="form-control" value="<?php echo isset($_GET['tipo']) ? htmlspecialchars($_GET['tipo']) : ''; ?>" required>
            </div>

            <!-- Campo Preço -->
            <div class="form-content mb-3">
                <label for="txtPreco">Preço</label>
                <input name="txtPreco" id="txtPreco" type="number" step="0.01" class="form-control" value="<?php echo isset($_GET['preco']) ? htmlspecialchars($_GET['preco']) : ''; ?>" required>
            </div>

            <!-- Botões -->
            <div class="text-center">
                <a href="listar_servico.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Atualização
                </a>
                <button type="submit" name="btnAtualizar" class="btn btn-primary w-100">
                    <i class="fa fa-wrench"></i> Atualizar
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
