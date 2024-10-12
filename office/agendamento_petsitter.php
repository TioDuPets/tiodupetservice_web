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
    <title>Agendamento de Pet Sitter</title>
</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
<div class="form-container col-md-6 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Agendar Pet Sitter</h1>
        <form id="agendamentoForm">

            <!-- Data e Hora de Início -->
            <div class="mb-3">
                <label for="data_hora" class="form-label">Data e Hora</label>
                <input type="datetime-local" class="form-control" name="data_hora" id="data_hora" required>
            </div>

            <!-- Seleção do pet -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="petID" class="form-label">Selecione o Pet</label>
                    <select name="petID" id="petID" class="form-select" required>
                        <?php
                        include 'conexaoAction.php'; // Inclui a conexão com o banco

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
                    <label for="clienteID" class="form-label">Selecione o Cliente</label>
                    <select name="clienteID" id="clienteID" class="form-select" required>
                        <?php
                        include 'conexaoAction.php';

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

            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-calendar-check-o"></i> Agendar</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Pet Sitter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Pet Sitter realizada com sucesso!</p>
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

            fetch('agendamentoAction_petsitter.php', {
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
