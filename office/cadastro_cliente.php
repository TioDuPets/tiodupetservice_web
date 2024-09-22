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
	<title>Cadastro Cliente</title>
</head>

<body>
<div class="container-centered">
    <div class="form-container">
        <h1 class="text-center">Cadastro de Cliente</h1>
        <form action="cadastroAction_cliente.php" method="post">
            <label for="txtID" hidden></label>
            <input name="txtID" id="txtID" type="text" hidden>

            <label for="txtNome">Nome Cliente</label>
            <input name="txtNome" id="txtNome" type="text" required>

            <div class="form-content">
                <label for="txtCpf">CPF</label>
                <input name="txtCpf" id="txtCpf" type="text" required>

                <label for="txtTelefone">Telefone</label>
                <input name="txtTelefone" id="txtTelefone" type="text" required>
            </div>

            <div class="form-content">
                <label for="txtEmail">Email</label>
                <input name="txtEmail" id="txtEmail" type="email" required>
	
                <label for="txtEndereco">Endereço</label>
                <input name="txtEndereco" id="txtEndereco" type="text" required>
            </div>

            <div class="form-content">
                <label for="txtNumero">Número</label>
                <input name="txtNumero" id="txtNumero" type="number">

                <label for="txtComplemento">Complemento</label>
                <input name="txtComplemento" id="txtComplemento" type="text">
            </div>

            <div class="form-content">
                <label for="txtBairro">Bairro</label>
                <input name="txtBairro" id="txtBairro" type="text" required>

                <label for="txtCep">CEP</label>
                <input name="txtCep" id="txtCep" type="text" required>
            </div>

            <div class="form-content">
                <label for="txtCidade">Cidade</label>
                <input name="txtCidade" id="txtCidade" type="text" required>

                <label for="txtEstado">Estado</label>
                <input name="txtEstado" id="txtEstado" type="text" required>
            </div>

            <button type="submit"><i class="fa fa-user-plus"></i> Adicionar</button>
        </form>
    </div>
</div>
