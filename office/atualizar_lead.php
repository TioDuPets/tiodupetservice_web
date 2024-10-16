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
    <title>Atualizar Lead</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Atualizar Lead - ID: <?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?></h1>

        <form id="atualizarleadForm">

            <input name="txtID" type="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

            <!-- Serviço Solicitado -->
            <div class="form-content mb-3">
                <label for="servico">Serviço</label>
                <input name="servico" id="servico" type="text" class="form-control" value="<?php echo isset($_GET['servico']) ? htmlspecialchars($_GET['servico']) : ''; ?>" required>
            </div>

            <!-- Data de Cadastro -->
            <div class="form-content mb-3">
                <label for="data_lead">Data Cadastro</label>
                <input name="data_lead" id="data_lead" type="date" class="form-control" value="<?php echo isset($_GET['data_lead']) ? htmlspecialchars(substr($_GET['data_lead'], 0, 10)) : ''; ?>" readonly>
            </div>

            <!-- Dados do Cliente -->
            <div class="form-content mb-3">
                <label for="nome">Nome Cliente</label>
                <input name="nome" id="nome" type="text" class="form-control" value="<?php echo isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : ''; ?>" required>
            </div>

            <div class="form-content mb-3">
                <label for="telefone">Telefone</label>
                <input name="telefone" id="telefone" type="text" class="form-control" value="<?php echo isset($_GET['telefone']) ? htmlspecialchars($_GET['telefone']) : ''; ?>" required>
            </div>

            <div class="form-content mb-3">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" class="form-control" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
            </div>

            <!-- Contato Preferido -->
            <div class="form-content mb-3">
                <label for="contato_prefere">Contato Preferido</label>
                <input name="contato_prefere" id="contato_prefere" type="text" class="form-control" value="<?php echo isset($_GET['contato_prefere']) ? htmlspecialchars($_GET['contato_prefere']) : ''; ?>" required>
            </div>

            <!-- Horário Preferido -->
            <div class="form-content mb-3">
                <label for="horario_prefere">Horário Preferido</label>
                <input name="horario_prefere" id="horario_prefere" type="text" class="form-control" value="<?php echo isset($_GET['horario_prefere']) ? htmlspecialchars($_GET['horario_prefere']) : ''; ?>" required>
            </div>

            <!-- Receber Novidades -->
            <div class="form-content mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="receber_novidades" id="receber_novidades" <?php echo isset($_GET['receber_novidades']) && $_GET['receber_novidades'] == '1' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="receber_novidades">Receber Novidades?</label>
            </div>

            <!-- Consentimento de Dados -->
            <div class="form-content mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="consentimento_dados" id="consentimento_dados" <?php echo isset($_GET['consentimento_dados']) && $_GET['consentimento_dados'] == '1' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="consentimento_dados">Consentimento de Dados?</label>
            </div>

            <!-- Data do Consentimento -->
            <div class="form-content mb-3">
                <label for="data_consentimento">Data do Consentimento</label>
                <input name="data_consentimento" id="data_consentimento" type="date" class="form-control" value="<?php echo isset($_GET['data_consentimento']) ? $_GET['data_consentimento'] : ''; ?>">
            </div>

            <!-- Política de Privacidade -->
            <div class="form-content mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="politica_privacidade" id="politica_privacidade" <?php echo isset($_GET['politica_privacidade']) && $_GET['politica_privacidade'] == '1' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="politica_privacidade">Aceitou a Política de Privacidade?</label>
            </div>

            <!-- Lead Contatado -->
            <div class="form-content mb-3">
                <label for="lead_contatado">Lead Contatado?</label>
                <input name="lead_contatado" id="lead_contatado" type="text" class="form-control" value="<?php echo isset($_GET['lead_contatado']) ? htmlspecialchars($_GET['lead_contatado']) : ''; ?>" required>
            </div>

            <!-- Botões -->
            <div class="text-center">
                <a href="listar_lead.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Atualização
                </a>
                <button type="submit" name="btnAtualizar" class="btn btn-primary w-100">
                    <i class="fa fa-user"></i> Atualizar
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
                <h5 class="modal-title" id="modalTitle">Atualização de Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Lead atualizado com sucesso!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src='bootstrap.bundle.min.js'></script>
<script>
    document.getElementById('atualizarleadForm').onsubmit = function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('atualizarAction_lead.php', {
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
