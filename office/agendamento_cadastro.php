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

include 'header.php';

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Buscar pets
$pet_result = $conn->query("SELECT id_pet, nome, id_cliente FROM pet");

// Buscar clientes
$clientes_result = $conn->query("SELECT id_cliente, nome FROM cliente");

// Buscar servicos
$servicos_result = $conn->query("SELECT id_servico, servico FROM servico");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Cadastro de Agendamento</title>
</head>
<body>
    <div class="container-centered container d-flex justify-content-center align-items-center">
        <div class="form-container col-md-6 bg-light p-4 rounded shadow">
            <h1 class="text-center mb-4 display-4">Cadastro de Agendamento</h1>
            <form id="agendamentoForm">

                <!-- Filtro de pet com autocomplete -->
                <div class="mb-3">
                    <label for="id_pet" class="form-label">Pet</label>
                    <select class="form-control" id="id_pet" name="id_pet" required>
                        <option value="">Selecione o Pet</option>
                        <?php while($pet = $pet_result->fetch_assoc()): ?>
                            <option value="<?= $pet['id_pet']; ?>" data-cliente="<?= $pet['id_cliente']; ?>"><?= $pet['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Cliente preenchido automaticamente -->
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" readonly>
                    <input type="hidden" id="id_cliente" name="id_cliente">
                </div>

                <!-- Filtro de serviço -->
                <div class="mb-3">
                    <label for="id_servico" class="form-label">Serviço</label>
                    <select class="form-control" id="id_servico" name="id_servico" required>
                        <option value="">Selecione o Serviço</option>
                        <?php while($servico = $servicos_result->fetch_assoc()): ?>
                            <option value="<?= $servico['id_servico']; ?>"><?= $servico['servico']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Tipo de serviço -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Serviço</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        <option value="Hospedagem">Hospedagem</option>
                        <option value="Pet Sitter">Pet Sitter</option>
                        <option value="Creche">Creche</option>
                    </select>
                </div>

                <!-- Datas de início e fim lado a lado -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="start" class="form-label">Data e Hora de Início</label>
                        <input type="datetime-local" class="form-control" id="start" name="start" required>
                    </div>
                    <div class="col-md-6">
                        <label for="end" class="form-label">Data e Hora de Fim</label>
                        <input type="datetime-local" class="form-control" id="end" name="end" required>
                    </div>
                </div>

                <!-- Checkbox Dia Completo centralizado -->
                <div class="mb-5 form-check">
                    <input type="checkbox" class="form-check-input" id="dia_completo" name="dia_completo">
                    <label class="form-check-label" for="dia_completo">Dia Completo</label>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Ativo">Ativo</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>

                <!-- Observações -->
                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea class="form-control" name="observacoes"></textarea>
                </div>

                <!-- Botão de Agendamento -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-calendar-check-o"></i> Agendar
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
            <h5 class="modal-title" id="modalTitle">Hospedagem</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Hospedagem realizada com sucesso!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <script src='bootstrap.bundle.min.js'></script>
    <script>
        document.getElementById('id_pet').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var clienteId = selectedOption.getAttribute('data-cliente');
            document.getElementById('id_cliente').value = clienteId;

            // Buscar o nome do cliente
            fetch('buscar_cliente.php?id_cliente=' + clienteId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nome_cliente').value = data.nome;
                });
        });

        document.getElementById('agendamentoForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('agendamento_salvar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
                document.getElementById('modalMessage').innerText = data.message;

                var matriculaModal = new bootstrap.Modal(document.getElementById('successModal'));
                matriculaModal.show();
            })
            .catch(error => console.error('Erro:', error));
        };
    </script>
</body>
<?php
include 'footer.php';
?>
</html>
