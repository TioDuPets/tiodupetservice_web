<?php
session_start();

$tempoExpiracao = 300;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $tempoExpiracao)) {
    session_unset(); 
    session_destroy(); 
    header("Location: login.php");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

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
    <title>Excluir Pet</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Excluir Pet - ID: <?php echo $pet_id; ?></h1>

        <!-- Exibe a imagem do pet -->
        <div class="text-center mb-3">
            <?php if (!empty($row['foto_pet'])): ?>
                <img src="uploads/<?php echo $row['foto_pet']; ?>" alt="Foto do Pet" class="img-fluid rounded">
            <?php else: ?>
                <p class="text-muted">Sem foto disponível.</p>
            <?php endif; ?>
        </div>

        <!-- Exibe os dados do pet -->
        <form id="excluirpetForm">
            <input name="txtID" type="hidden" value="<?php echo $pet_id; ?>">

            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtNome" class="form-label">Nome do Pet</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" value="<?php echo htmlspecialchars($row['nome']); ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="txtRga" class="form-label">RGA</label>
                    <input name="txtRga" id="txtRga" type="text" class="form-control" value="<?php echo htmlspecialchars($row['rga']); ?>" disabled>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtEspecie" class="form-label">Espécie</label>
                    <input name="txtEspecie" id="txtEspecie" type="text" class="form-control" value="<?php echo htmlspecialchars($row['especie']); ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="txtRaca" class="form-label">Raça</label>
                    <input name="txtRaca" id="txtRaca" type="text" class="form-control" value="<?php echo htmlspecialchars($row['raca']); ?>" disabled>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtCor" class="form-label">Cor</label>
                    <input name="txtCor" id="txtCor" type="text" class="form-control" value="<?php echo htmlspecialchars($row['cor']); ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="txtIdade" class="form-label">Idade</label>
                    <input name="txtIdade" id="txtIdade" type="number" class="form-control" value="<?php echo htmlspecialchars($row['idade']); ?>" disabled>
                </div>
            </div>

            <!-- Botões de confirmação -->
            <div class="text-center">
                <a href="listar_pet.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Exclusão
                </a>
                <button type="submit" name="btnExcluir" class="btn btn-danger w-100">
                    <i class="fa fa-trash"></i> Confirmar Exclusão
                </button>
            </div>
        </form>
    </div>
</div>

        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Exclusão Pet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Pet excluído com sucesso!</p>
            </div>
            <div class="modal-footer">
                <button id="closeButton" class="btn btn-primary">
                <i class="fa fa-times"></i> Fechar
                </button>
            </div>
            </div>
        </div>
        </div>

        <script src='bootstrap.bundle.min.js'></script>
        <script>
        document.getElementById('excluirpetForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('excluirAction_pet.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
            document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
            document.getElementById('modalMessage').innerText = data.message;

            var matriculaModal = new bootstrap.Modal(document.getElementById('successModal'));
            matriculaModal.show();

            // Após o fechamento do modal, redirecionar para listar_veterinario.php
            document.getElementById('closeButton').addEventListener('click', function() {
                window.location.href = 'listar_pet.php';
            });
            })
            .catch(error => {
            console.error('Erro:', error);

            // Exibir o modal com mensagem de erro
            document.getElementById('modalTitle').innerText = 'Erro';
            document.getElementById('modalMessage').innerText = 'Erro ao excluir o veterinário. Tente novamente.';

            var errorModal = new bootstrap.Modal(document.getElementById('successModal'));
            errorModal.show();
            });
        };
        </script>

</body>

<?php
// Fecha a conexão
$conexao->close();
?>
</html>
<?php
include 'footer.php';
?>
