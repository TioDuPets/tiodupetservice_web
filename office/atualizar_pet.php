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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Atualizar Pet</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Atualizar Pet - ID: <?php echo $pet_id; ?></h1>

        <!-- Exibe a imagem do pet -->
        <div class="text-center mb-3">
            <?php if (!empty($row['foto_pet'])): ?>
                <img src="uploads/<?php echo $row['foto_pet']; ?>" alt="Foto do Pet" class="img-fluid rounded">
            <?php else: ?>
                <p class="text-muted">Sem foto disponível.</p>
            <?php endif; ?>
        </div>

        <form action="atualizarAction_pet.php" method="post" enctype="multipart/form-data">
            <!-- Campo oculto ID -->
            <input name="txtID" type="hidden" value="<?php echo $pet_id; ?>">

            <!-- Nome e RGA -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtNome" class="form-label">Nome do Pet</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="txtRga" class="form-label">RGA</label>
                    <input name="txtRga" id="txtRga" type="text" class="form-control" value="<?php echo htmlspecialchars($row['rga']); ?>">
                </div>
            </div>

            <!-- Sexo e Espécie -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtSexo" class="form-label">Sexo</label>
                    <input name="txtSexo" id="txtSexo" type="text" class="form-control" value="<?php echo htmlspecialchars($row['sexo']); ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtEspecie" class="form-label">Espécie</label>
                    <input name="txtEspecie" id="txtEspecie" type="text" class="form-control" value="<?php echo htmlspecialchars($row['especie']); ?>">
                </div>
            </div>

            <!-- Raça e Cor -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtRaca" class="form-label">Raça</label>
                    <input name="txtRaca" id="txtRaca" type="text" class="form-control" value="<?php echo htmlspecialchars($row['raca']); ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCor" class="form-label">Cor</label>
                    <input name="txtCor" id="txtCor" type="text" class="form-control" value="<?php echo htmlspecialchars($row['cor']); ?>">
                </div>
            </div>

            <!-- Idade e Porte -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtIdade" class="form-label">Idade</label>
                    <input name="txtIdade" id="txtIdade" type="number" class="form-control" value="<?php echo htmlspecialchars($row['idade']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="txtPorte" class="form-label">Porte</label>
                    <input name="txtPorte" id="txtPorte" type="text" class="form-control" value="<?php echo htmlspecialchars($row['porte']); ?>">
                </div>
            </div>

            <!-- Campo para atualizar a foto do pet -->
            <div class="mb-3">
                <label for="foto_pet" class="form-label">Atualizar Foto do Pet</label>
                <input type="file" name="foto_pet" id="foto_pet" class="form-control" accept="image/*">
            </div>

            <!-- Botões -->
            <div class="text-center">
                <a href="listar_pet.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Atualização
                </a>
                <button type="submit" name="btnAtualizar" class="btn btn-primary w-100">
                    <i class="fa fa-paw"></i> Atualizar
                </button>
            </div>
        </form>
    </div>
</div>

</body>

<?php
// Fecha a conexão
$conexao->close();
?>
</html>
