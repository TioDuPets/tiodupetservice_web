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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container-centered {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }
        .form-content {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .form-content label {
            flex: 0 0 45%; /* Largura do rótulo */
            margin-bottom: 5px;
        }
        .form-content input[type="text"], 
        .form-content input[type="number"], 
        .form-content input[type="email"] {
            flex: 1; /* O input ocupará o espaço restante */
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
            text-align: center;
            transition: background-color 0.3s;
        }
        button a {
            color: white;
            text-decoration: none;
        }
        button:hover {
            background-color: #45a049;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">
            <h1 class="text-center">Atualizar Cliente - ID: <?php echo " " . (isset($_GET['id']) ? $_GET['id'] : ''); ?></h1>
            <form action="atualizarAction_cliente.php" method="post">

                <input name="txtID" type="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

                <div class="form-content">
                    <label>Nome Cliente</label>
                    <input name="txtNome" type="text" value="<?php echo isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>CPF</label>
                    <input name="txtCpf" type="text" value="<?php echo isset($_GET['cpf']) ? htmlspecialchars($_GET['cpf']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Telefone</label>
                    <input name="txtTelefone" type="text" value="<?php echo isset($_GET['telefone']) ? htmlspecialchars($_GET['telefone']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Email</label>
                    <input name="txtEmail" type="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Endereço</label>
                    <input name="txtEndereco" type="text" value="<?php echo isset($_GET['endereco']) ? htmlspecialchars($_GET['endereco']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Número</label>
                    <input name="txtNumero" type="number" value="<?php echo isset($_GET['numero']) ? htmlspecialchars($_GET['numero']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Complemento</label>
                    <input name="txtComplemento" type="text" value="<?php echo isset($_GET['complemento']) ? htmlspecialchars($_GET['complemento']) : ''; ?>">
                </div>

                <div class="form-content">
                    <label>Bairro</label>
                    <input name="txtBairro" type="text" value="<?php echo isset($_GET['bairro']) ? htmlspecialchars($_GET['bairro']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>CEP</label>
                    <input name="txtCep" type="text" value="<?php echo isset($_GET['cep']) ? htmlspecialchars($_GET['cep']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Cidade</label>
                    <input name="txtCidade" type="text" value="<?php echo isset($_GET['cidade']) ? htmlspecialchars($_GET['cidade']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Estado</label>
                    <input name="txtEstado" type="text" value="<?php echo isset($_GET['estado']) ? htmlspecialchars($_GET['estado']) : ''; ?>" required>
                </div>

                <div class="text-center">
                    <button name="btnCancelar">
                        <a href="listar_cliente.php">
                            <i class="fa fa-ban"></i> Cancelar Atualização
                        </a>
                    </button>

                    <button name="btnAtualizar">
                        <i class="fa fa-user"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
<?php
include 'footer.php';
?>
</html>
