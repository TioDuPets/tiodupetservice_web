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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Agendamento de Hospedagem</title>
</head>
<body>
    <div class="container-centered container d-flex justify-content-center align-items-center">
        <div class="form-container col-md-6 bg-light p-4 rounded shadow">
            <h1 class="text-center mb-4 display-4">Agendar Hospedagem</h1>
            <form id="agendamentoForm">

                <!-- Datas de check-in e check-out -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="checkin" class="form-label">Data de Check-in</label>
                        <input type="date" class="form-control" name="checkin" id="start" required>
                    </div>

                    <div class="col-md-6">
                        <label for="checkout" class="form-label">Data de Check-out</label>
                        <input type="date" class="form-control" name="checkout" id="end" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Seleção do pet -->
                    <div class="col-md-6">
                        <label for="pet_ID" class="form-label">Selecione o Pet</label>
                        <select name="pet_ID" id="pet_ID" class="form-select" required>
                            <?php
                            include 'conexaoAction.php'; // Inclui a conexão com o banco

                            // Executa a consulta para buscar o id e nome dos pets
                            $result = mysqli_query($conexao, "SELECT id, nome FROM pet");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum pet encontrado</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Seleção do cliente (tutor) -->
                    <div class="col-md-6">
                        <label for="cliente_ID" class="form-label">Selecione o Cliente</label>
                        <select name="cliente_ID" id="cliente_ID" class="form-select" required>
                            <?php
                            include 'conexaoAction.php'; // Inclui a conexão com o banco

                            // Buscando clientes cadastrados no banco de dados
                            $result = mysqli_query($conexao, "SELECT id, nome FROM cliente");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum cliente encontrado</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Observações adicionais -->
                <div class="mb-3">
                    <label for="observacoes" class="form-label">Observações</label>
                    <textarea name="observacoes" id="observacoes" class="form-control" rows="2"></textarea>
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
          document.getElementById('agendamentoForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('agendamentoAction_hospedagem.php', {
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
