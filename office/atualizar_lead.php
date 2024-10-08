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
    <title>Atualizar Lead</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Atualizar Lead - ID: <?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?></h1>

        <form action="atualizarAction_lead.php" method="post">

            <input name="txtID" type="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

            <!-- Serviço e Data Solicitada -->
            <div class="form-content mb-3">
                <label for="serviceTypeInput">Serviço</label>
                <input name="serviceTypeInput" id="serviceTypeInput" type="text" class="form-control" value="<?php echo isset($_GET['servico']) ? htmlspecialchars($_GET['servico']) : ''; ?>" required>
            </div>

            <div class="form-content mb-3">
                <label for="selectedDate">Data Solicitada</label>
                <input name="selectedDate" id="selectedDate" type="date" class="form-control" value="<?php echo isset($_GET['data_lead']) ? $_GET['data_lead'] : ''; ?>" required>
            </div>

            <!-- Dados do Cliente -->
            <div class="form-content mb-3">
                <label for="txtNome">Nome Cliente</label>
                <input name="txtNome" id="txtNome" type="text" class="form-control" value="<?php echo isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : ''; ?>" required>
            </div>

            <div class="form-content mb-3">
                <label for="txtTelefone">Telefone</label>
                <input name="txtTelefone" id="txtTelefone" type="text" class="form-control" value="<?php echo isset($_GET['telefone']) ? htmlspecialchars($_GET['telefone']) : ''; ?>" required>
            </div>

            <div class="form-content mb-3">
                <label for="txtEmail">Email</label>
                <input name="txtEmail" id="txtEmail" type="email" class="form-control" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
            </div>

            <!-- Lead Contatado -->
            <div class="form-content mb-3">
                <label for="lead_contatado">Lead Contatado?</label>
                <input name="lead_contatado" id="lead_contatado" type="text" class="form-control" value="<?php echo isset($_GET['lead_contatado']) ? htmlspecialchars($_GET['lead_contatado']) : ''; ?>" required>
            </div>

            <!-- Botões -->
            <div class="text-center">
                <a href="listar_lead.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Atualização
                </a>
                <button type="submit" name="btnAtualizar" class="btn btn-primary w-100">
                    <i class="fa fa-user"></i> Atualizar
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
