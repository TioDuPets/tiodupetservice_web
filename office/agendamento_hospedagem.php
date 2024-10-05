<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Agendamento de Hospedagem</title>
</head>
<body>
<section>
<div class="container-centered">
    <div class="form-container">
        <h1 class="text-center">Agendar Hospedagem</h1>
        <form action="agendamentoAction_hospedagem.php" method="post">
            <!-- Seleção do pet -->
            <div class="form-content">
                <label for="petID">Selecione o Pet</label>
                <select name="petID" id="petID" required>
                    <?php
                    // Buscando pets cadastrados no banco de dados
                    include 'conexaoAction.php'; // Inclua a conexão com o banco
                    $result = mysqli_query($conn, "SELECT id, nome FROM pets");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Seleção do cliente (tutor) -->
            <div class="form-content">
                <label for="clienteID">Selecione o Cliente</label>
                <select name="clienteID" id="clienteID" required>
                    <?php
                    // Buscando clientes cadastrados no banco de dados
                    $result = mysqli_query($conn, "SELECT id, nome FROM clientes");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Datas de check-in e check-out -->
            <div class="form-content">
                <label for="checkin">Data de Check-in</label>
                <input type="date" name="checkin" id="checkin" required>

                <label for="checkout">Data de Check-out</label>
                <input type="date" name="checkout" id="checkout" required>
            </div>

            <!-- Observações adicionais -->
            <div class="form-content">
                <label for="observacoes">Observações</label>
                <textarea name="observacoes" id="observacoes" rows="4"></textarea>
            </div>

            <button type="submit" class="botao"><i class="fa fa-calendar-check-o"></i> Agendar</button>
        </form>
    </div>
</div>
</section>
</body>
<?php
include 'footer.php';
?>
</html>
