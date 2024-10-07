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
    <title>Atualizar Lead</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        .container-centered {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: box-shadow 0.3s;
        }
        .container-centered:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
            font-size: 24px;
        }
        .form-content {
            margin-bottom: 20px;
        }
        .form-content label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
            font-weight: bold;
        }
        .form-content input[type="text"], 
        .form-content input[type="date"],
        .form-content input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-content input[type="text"]:focus, 
        .form-content input[type="date"]:focus,
        .form-content input[type="number"]:focus {
            border-color: #007BFF;
            outline: none;
        }
        button {
            background-color: #007BFF;
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
            background-color: #0056b3;
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

        <h1 class="text-center">Atualizar Lead - ID: <?php echo " " . $_GET['id']; ?></h1>
		<form action="atualizarAction_lead.php" method='post'>

			<input name="txtID" type="hidden" value="<?php echo $_GET['id']; ?>">
			
            <div class="form-content">
				<label>Serviço</label>
				<input name="serviceTypeInput" value="<?php echo $_GET['servico']; ?>" required>

				<label>Data Solicitada</label>
				<input name="selectedDate" type="date" value="<?php echo $_GET['data_lead']; ?>" required>
			</div>

            <div class="form-content">
				<label>Nome Cliente</label>
				<input name="txtNome" value="<?php echo $_GET['nome']; ?>" required>

				<label>Telefone</label>
				<input name="txtTelefone" value="<?php echo $_GET['telefone']; ?>" required>

				<label>Email</label>
				<input name="txtEmail" value="<?php echo $_GET['email']; ?>" required>
			</div>

            <div class="form-content">
				<label>Lead contatado?</label>
				<input name="lead_contatado" value="<?php echo $_GET['lead_contatado']; ?>" required>
			</div>

			<div class="form-content text-center">
				<button name="btnCancelar"><a href="listar_lead.php">
					<i class="fa fa-ban"></i> Cancelar Atualização</a>
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
