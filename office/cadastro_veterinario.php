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
	<title>Cadastro Veterinário</title>
</head>

<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Veterinário</h1>
        <form id="cadastroveterinarioForm">

            <!-- Campo oculto ID -->
            <input type="text" name="txtID" hidden>

            <!-- Nome Veterinário -->
            <div class="row mb-1">
                <div class="col-md-12">
                    <label for="txtNome" class="form-label">Nome do Veterinário</label>
                    <input type="text" name="txtNome" id="txtNome" class="form-control" required>
                </div>
            </div>

            <!-- Telefone e Email -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtTelefone" class="form-label">Telefone</label>
                    <input type="text" name="txtTelefone" id="txtTelefone" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" required>
                </div>
            </div>

            <!-- Endereço, Número e Complemento -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtEndereco" class="form-label">Endereço</label>
                    <input type="text" name="txtEndereco" id="txtEndereco" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="txtNumero" class="form-label">Número</label>
                    <input type="number" name="txtNumero" id="txtNumero" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="txtComplemento" class="form-label">Complemento</label>
                    <input type="text" name="txtComplemento" id="txtComplemento" class="form-control">
                </div>
            </div>

            <!-- Bairro e CEP -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtBairro" class="form-label">Bairro</label>
                    <input type="text" name="txtBairro" id="txtBairro" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtCep" class="form-label">CEP</label>
                    <input type="text" name="txtCep" id="txtCep" class="form-control" required>
                </div>
            </div>

            <!-- Cidade e Estado -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtCidade" class="form-label">Cidade</label>
                    <input type="text" name="txtCidade" id="txtCidade" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEstado" class="form-label">Estado</label>
                    <input type="text" name="txtEstado" id="txtEstado" class="form-control" required>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-ambulance"></i> Adicionar
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
            <h5 class="modal-title" id="modalTitle">Cadastro Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Cadastro de Cliente realizado com sucesso!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <script src='bootstrap.bundle.min.js'></script>
    <script>
          document.getElementById('cadastroveterinarioForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('cadastroAction_veterinario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
                document.getElementById('modalMessage').innerText = data.message;

                 // Limpa os campos do formulário após o envio
                if (data.status === 'success') {
                    this.reset(); // Reseta todos os campos do formulário
                }

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