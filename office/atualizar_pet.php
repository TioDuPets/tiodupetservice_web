<?php
include 'header.php';

// Conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Cria a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se há erros na conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Pega o ID do pet
$pet_id = $_GET['id'];

// Busca os dados do pet, incluindo a imagem
$sql = "SELECT * FROM pet WHERE id = $pet_id";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    // Pega os dados do pet
    $row = $resultado->fetch_assoc();
} else {
    echo "<div class='container'><p class='text-danger text-center'>Pet não encontrado.</p></div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Atualizar Pet</title>
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
        }
        .form-content label {
            flex: 0 0 45%; /* Largura do rótulo */
        }
        .form-content input[type="text"], 
        .form-content input[type="number"], 
        .form-content input[type="file"] {
            flex: 1; /* O input ocupará o espaço restante */
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        .form-content img {
            display: block;
            max-width: 400px;
            max-height: 300px;
            width: 100%;
            height: auto;
            margin: 20px auto;
            border-radius: 10px;
            border: 2px solid #ddd;
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
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">
            <h1>Atualizar Pet - ID: <?php echo $pet_id; ?></h1>

            <!-- Exibe a imagem do pet -->
            <div class="text-center">
                <?php if (!empty($row['foto_pet'])): ?>
                    <img src="uploads/<?php echo $row['foto_pet']; ?>" alt="Foto do Pet">
                <?php else: ?>
                    <p>Sem foto disponível.</p>
                <?php endif; ?>
            </div>

            <form action="atualizarAction_pet.php" method="post" enctype="multipart/form-data">
                <input name="txtID" type="hidden" value="<?php echo $pet_id; ?>">

                <div class="form-content">
                    <label>Nome do Pet</label>
                    <input name="txtNome" type="text" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
                </div>

                <div class="form-content">
                    <label>RGA</label>
                    <input name="txtRga" type="text" value="<?php echo htmlspecialchars($row['rga']); ?>">
                </div>

                <div class="form-content">
                    <label>Sexo</label>
                    <input name="txtSexo" type="text" value="<?php echo htmlspecialchars($row['sexo']); ?>">
                </div>

                <div class="form-content">
                    <label>Espécie</label>
                    <input name="txtEspecie" type="text" value="<?php echo htmlspecialchars($row['especie']); ?>">
                </div>

                <div class="form-content">
                    <label>Raça</label>
                    <input name="txtRaca" type="text" value="<?php echo htmlspecialchars($row['raca']); ?>">
                </div>

                <div class="form-content">
                    <label>Cor</label>
                    <input name="txtCor" type="text" value="<?php echo htmlspecialchars($row['cor']); ?>">
                </div>

                <div class="form-content">
                    <label>Idade</label>
                    <input name="txtIdade" type="number" value="<?php echo htmlspecialchars($row['idade']); ?>" required>
                </div>

                <div class="form-content">
                    <label>Porte</label>
                    <input name="txtPorte" type="text" value="<?php echo htmlspecialchars($row['porte']); ?>">
                </div>

                <!-- Campo para atualizar a foto do pet -->
                <div class="form-content">
                    <label for="foto_pet">Atualizar Foto do Pet</label>
                    <input type="file" name="foto_pet" id="foto_pet" accept="image/*">
                </div>

                <div class="form-content text-center">
                    <button name="btnCancelar">
                        <a href="listar_pet.php"><i class="fa fa-ban"></i> Cancelar Atualização</a>
                    </button>
                    <button name="btnAtualizar">
                        <i class="fa fa-paw"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>

<?php
// Fecha a conexão
$conexao->close();
?>
