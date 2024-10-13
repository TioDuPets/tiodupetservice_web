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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";
$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "
        SELECT mc.*, p.nome AS nome_pet, c.nome AS nome_cliente, v.nome AS nome_veterinario, s.servico AS nome_servico
        FROM matricula_creche mc
        JOIN pet p ON mc.id_pet = p.id
        JOIN cliente c ON mc.id_cliente = c.id
        JOIN veterinario v ON mc.id_veterinario = v.id
        JOIN servico s ON mc.id_servico = s.id
        WHERE mc.id = $id";
    
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $dados = $resultado->fetch_assoc();
    } else {
        echo "Matrícula não encontrada.";
        exit();
    }
} else {
    echo "ID da matrícula não informado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Atualizar Matrícula da Creche</title>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container">
            <div class="bg-light p-4 rounded shadow">
                <h1 class="text-center mb-4 display-4">Atualizar Matrícula da Creche</h1>

                <form id="atualizarForm">
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

                    <div class="mb-3">
                        <label for="nome_servico" class="form-label">Serviço</label>
                        <input type="text" class="form-control" id="nome_servico" name="nome_servico" value="<?php echo $dados['nome_servico']; ?>" disabled>
                        <input type="hidden" name="id_servico" value="<?php echo $dados['id_servico']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nome_pet" class="form-label">Pet</label>
                        <input type="text" class="form-control" id="nome_pet" name="nome_pet" value="<?php echo $dados['nome_pet']; ?>" disabled>
                        <input type="hidden" name="id_pet" value="<?php echo $dados['id_pet']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nome_cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?php echo $dados['nome_cliente']; ?>" disabled>
                        <input type="hidden" name="id_cliente" value="<?php echo $dados['id_cliente']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nome_veterinario" class="form-label">Veterinário</label>
                        <input type="text" class="form-control" id="nome_veterinario" name="nome_veterinario" value="<?php echo $dados['nome_veterinario']; ?>">
                        <input type="hidden" name="id_veterinario" value="<?php echo $dados['id_veterinario']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="data_matricula" class="form-label">Data de Matrícula</label>
                        <input type="date" class="form-control" id="data_matricula" name="data_matricula" value="<?php echo $dados['data_matricula']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Ativa" <?php echo ($dados['status'] == 'Ativa') ? 'selected' : ''; ?>>Ativa</option>
                            <option value="Inativa" <?php echo ($dados['status'] == 'Inativa') ? 'selected' : ''; ?>>Inativa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="horario_entrada" class="form-label">Horário de Entrada</label>
                        <input type="time" class="form-control" id="horario_entrada" name="horario_entrada" value="<?php echo $dados['horario_entrada']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="horario_saida" class="form-label">Horário de Saída</label>
                        <input type="time" class="form-control" id="horario_saida" name="horario_saida" value="<?php echo $dados['horario_saida']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="data_fim" class="form-label">Data de Término</label>
                        <input type="date" class="form-control" id="data_fim" name="data_fim" value="<?php echo $dados['data_fim']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="observacao" class="form-label">Observação</label>
                        <textarea class="form-control" id="observacao" name="observacao" rows="3"><?php echo $dados['observacao']; ?></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Atualizar Matrícula</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modal do Bootstrap -->
<div class="modal fade" id="atualizarModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Atualização</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Matrícula atualizada com sucesso!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('atualizarForm').onsubmit = function(event) {
        event.preventDefault();  // Impede o envio padrão do formulário

        var formData = new FormData(this);  // Pega os dados do formulário

        fetch('matricula_atualizarAction_creche.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na resposta do servidor');
            }
            return response.json();  // Converte a resposta em JSON
        })
        .then(data => {
            // Verifica o status da resposta
            document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
            document.getElementById('modalMessage').innerText = data.message;

            // Exibe o modal do Bootstrap
            var atualizarModal = new bootstrap.Modal(document.getElementById('atualizarModal'));
            atualizarModal.show();
        })
        .catch(error => {
            console.error('Erro:', error);
            document.getElementById('modalTitle').innerText = 'Erro';
            document.getElementById('modalMessage').innerText = 'Ocorreu um erro ao processar a solicitação.';
            
            // Exibe o modal em caso de erro
            var atualizarModal = new bootstrap.Modal(document.getElementById('atualizarModal'));
            atualizarModal.show();
        });
    };
</script>

<script src='bootstrap.bundle.min.js'></script>

</body>
<?php
include 'footer.php';
?>
</html>
