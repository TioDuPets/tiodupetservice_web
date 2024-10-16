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
	<title>Cadastro Serviço</title>

</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-6 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Serviço</h1>
        
        <form id="cadastroservicoForm">
            
            <!-- Campo oculto ID -->
            <input type="text" name="txtID" id="txtID" hidden>

            <!-- Serviço, Tipo e Preço -->
            <div class="row mb-1">
                <div class="col-md-12">
                    <label for="txtServico" class="form-label">Serviço</label>
                    <input type="text" name="txtServico" id="txtServico" class="form-control" required>
                </div>
            </div>

            <div class="row mb-1">
            <div class="col-md-6">
                <label for="txtTipo" class="form-label">Tipo</label>
                <select name="txtTipo" id="txtTipo" class="form-control" required>
                    <option value="">Selecione o tipo de serviço</option> <!-- Placeholder -->
                    <option value="Hospedagem">Hospedagem</option>
                    <option value="Pet Sitter">Pet Sitter</option>
                    <option value="Creche">Creche</option>
                </select>
                </div>

                <div class="col-md-6">
                    <label for="txtPreco" class="form-label">Preço</label>
                    <input type="double" name="txtPreco" id="txtPreco" class="form-control" required>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-wrench"></i> Adicionar
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
            <h5 class="modal-title" id="modalTitle">Cadastro Serviço</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Serviço cadastrado com sucesso!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <script src='bootstrap.bundle.min.js'></script>
    <script>
            document.getElementById('cadastroservicoForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('cadastroAction_servico.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Verifique o que está sendo retornado pelo servidor

                document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
                document.getElementById('modalMessage').innerText = data.message;

                // Limpa os campos do formulário após o envio
                if (data.status === 'success') {
                    this.reset(); // Reseta todos os campos do formulário
                }

                var matriculaModal = new bootstrap.Modal(document.getElementById('successModal'));
                matriculaModal.show();
            })
            .catch(error => {
                console.error('Erro:', error);

                document.getElementById('modalTitle').innerText = 'Erro';
                document.getElementById('modalMessage').innerText = 'Ocorreu um erro ao processar a solicitação.';
                
                var errorModal = new bootstrap.Modal(document.getElementById('successModal'));
                errorModal.show();
            });
            };

    </script>

</body>

<?php
include 'footer.php';
?>