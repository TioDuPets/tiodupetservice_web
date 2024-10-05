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
    <title>Agendamento de Pet Sitter</title>
</head>
<body>
<section>
<div class="container-centered">
    <div class="form-container">
        <h1 class="text-center">Agendar Pet Sitter</h1>
        <form action="agendamentoAction_petsitter.php" method="post">

            <!-- Data e Hora de Início -->
            <div class="form-content">
                <label for="data_hora">Data e Hora</label>
                <input type="datetime-local" name="data_hora" id="data_hora" required>
            </div>

            <!-- Seleção do pet -->
            <div class="form-content">
                <label for="petID">Selecione o Pet</label>
                <select name="petID" id="petID" required>
                    <?php
                    // Buscando pets cadastrados no banco de dados
                    include 'conexaoAction.php'; // Inclui a conexão com o banco

                    // Executa a consulta para buscar o id e nome dos pets
                    $result = mysqli_query($conexao, "SELECT id, nome FROM pet");

                    // Verifica se a consulta retornou algum resultado
                    if (mysqli_num_rows($result) > 0) {
                        // Percorre os resultados e exibe cada pet como uma opção no select
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
            <div class="form-content">
                <label for="clienteID">Selecione o Cliente</label>
                <select name="clienteID" id="clienteID" required>
                    <?php
                    // Inclua a conexão com o banco de dados
                    include 'conexaoAction.php';

                    // Buscando clientes cadastrados no banco de dados
                    $result = mysqli_query($conexao, "SELECT id, nome FROM cliente");

                    // Verifica se a consulta retornou resultados
                    if (mysqli_num_rows($result) > 0) {
                        // Exibe os clientes como opções no select
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum cliente encontrado</option>";
                    }
                    ?>
                </select>
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
