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
    <title>Matrícula na Creche</title>
</head>
<body>
    <div class="container-centered container d-flex justify-content-center align-items-center">
        <div class="form-container col-md-6 bg-light p-4 rounded shadow">
            <h1 class="text-center mb-4 display-4">Matrícula Creche</h1>
            <form id="matriculaForm">

                <!-- Serviço -->
                <div class="mb-3">
                    <label for="id_servico" class="form-label">Selecione o Serviço</label>
                    <select name="id_servico" id="id_servico" class="form-select">
                        <?php
                        include 'conexaoAction.php';

                        // Buscando serviços disponíveis
                        $result = mysqli_query($conexao, "SELECT id, servico FROM servico");

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id']}'>{$row['servico']}</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhum serviço encontrado</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Pet -->
                <div class="mb-3">
                    <label for="id_pet" class="form-label">Selecione o Pet</label>
                    <select name="id_pet" id="id_pet" class="form-select" required>
                        <?php
                        // Buscando pets cadastrados
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

                                <!-- Cliente -->
                                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Selecione o Cliente</label>
                    <select name="id_cliente" id="id_cliente" class="form-select" required>
                        <?php
                        // Buscando clientes cadastrados
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

                <!-- Veterinário -->
                <div class="mb-3">
                    <label for="id_veterinario" class="form-label">Selecione o Veterinário</label>
                    <select name="id_veterinario" id="id_veterinario" class="form-select" required>
                        <?php
                        // Buscando veterinários cadastrados
                        $result = mysqli_query($conexao, "SELECT id, nome FROM veterinario");

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhum veterinário encontrado</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Data de Matrícula -->
                <div class="mb-3">
                    <label for="data_matricula" class="form-label">Data da Matrícula</label>
                    <input type="date" class="form-control" name="data_matricula" id="data_matricula" required>
                </div>

                <!-- Status -->
                <!--div class="mb-3"-->
                    <label for="status" class="form-label"></label>
                    <select name="status" id="status" class="form-select" hidden>
                        <option value="Ativa">Matrícula Ativa</option>
                        <option value="Inativa">Matrícula Inativa</option>
                    </select>
                <!--/div-->

                <!-- Horário de Entrada e Saída -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="horario_entrada" class="form-label">Horário de Entrada</label>
                        <input type="time" class="form-control" name="horario_entrada" id="horario_entrada" required>
                    </div>
                    <div class="col-md-6">
                        <label for="horario_saida" class="form-label">Horário de Saída</label>
                        <input type="time" class="form-control" name="horario_saida" id="horario_saida" required>
                    </div>
                </div>

                <!-- Observações -->
                <div class="mb-3">
                    <label for="observacao" class="form-label">Observação</label>
                    <textarea name="observacao" id="observacao" class="form-control" rows="2"></textarea>
                </div>

                <!-- Botão de Matrícula -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-check-circle"></i> Confirmar Matrícula
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal do Bootstrap -->
    <div class="modal fade" id="matriculaModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Matrícula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalMessage">Matrícula realizada com sucesso!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src='bootstrap.bundle.min.js'></script>
    <script>
        document.getElementById('matriculaForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('matriculaAction_creche.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
                document.getElementById('modalMessage').innerText = data.message;

                var matriculaModal = new bootstrap.Modal(document.getElementById('matriculaModal'));
                matriculaModal.show();
            })
            .catch(error => console.error('Erro:', error));
        };

        // Definindo data e horário padrão
        document.getElementById('data_matricula').value = new Date().toISOString().split('T')[0];
        document.getElementById('horario_entrada').value = '08:00';
        document.getElementById('horario_saida').value = '17:00';
    </script>
</body>

<?php
include 'footer.php';
?>
</html>
