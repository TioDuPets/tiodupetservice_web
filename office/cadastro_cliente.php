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
	<title>Cadastro Cliente</title>
</head>

<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Cliente</h1>
        <form action="cadastroAction_cliente.php" method="post">

            <!-- Campo oculto ID -->
            <input name="txtID" id="txtID" type="text" hidden>

            <!-- Nome e CPF -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtNome" class="form-label">Nome do Cliente</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtCpf" class="form-label">CPF</label>
                    <input name="txtCpf" id="txtCpf" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Telefone e Email -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtTelefone" class="form-label">Telefone</label>
                    <input name="txtTelefone" id="txtTelefone" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input name="txtEmail" id="txtEmail" type="email" class="form-control" required>
                </div>
            </div>

            <!-- Endereço, Número e Complemento -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtEndereco" class="form-label">Endereço</label>
                    <input name="txtEndereco" id="txtEndereco" type="text" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="txtNumero" class="form-label">Número</label>
                    <input name="txtNumero" id="txtNumero" type="number" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="txtComplemento" class="form-label">Complemento</label>
                    <input name="txtComplemento" id="txtComplemento" type="text" class="form-control">
                </div>
            </div>

            <!-- Bairro e CEP -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtBairro" class="form-label">Bairro</label>
                    <input name="txtBairro" id="txtBairro" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtCep" class="form-label">CEP</label>
                    <input name="txtCep" id="txtCep" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Cidade e Estado -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtCidade" class="form-label">Cidade</label>
                    <input name="txtCidade" id="txtCidade" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEstado" class="form-label">Estado</label>
                    <input name="txtEstado" id="txtEstado" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-user-plus"></i> Adicionar
                </button>
            </div>
        </form>
    </div>
</div>

</body>

<?php
include 'footer.php';
?>