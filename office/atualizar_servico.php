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
    <title>Atualizar Serviço</title>
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
        }
        .form-content label {
            display: block;
            margin-bottom: 5px;
        }
        .form-content input[type="text"], 
        .form-content input[type="number"], 
        .form-content input[type="email"] {
            width: 100%;
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
            <h1 class="text-center">Atualizar Serviço - ID: <?php echo " " . (isset($_GET['id']) ? $_GET['id'] : ''); ?></h1>
            <form action="atualizarAction_servico.php" method="post">

                <input name="txtID" type="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

                <div class="form-content">
                    <label>Serviço</label>
                    <input name="txtServico" type="text" value="<?php echo isset($_GET['servico']) ? htmlspecialchars($_GET['servico']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Tipo</label>
                    <input name="txtTipo" type="text" value="<?php echo isset($_GET['tipo']) ? htmlspecialchars($_GET['tipo']) : ''; ?>" required>
                </div>

                <div class="form-content">
                    <label>Preço</label>
                    <input name="txtPreco" type="number" step="0.01" value="<?php echo isset($_GET['preco']) ? htmlspecialchars($_GET['preco']) : ''; ?>" required>
                </div>

                <div class="text-center">
                    <button name="btnCancelar">
                        <a href="listar_servico.php">
                            <i class="fa fa-ban"></i> Cancelar Atualização
                        </a>
                    </button>

                    <button name="btnAtualizar">
                        <i class="fa fa-wrench"></i> Atualizar
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
