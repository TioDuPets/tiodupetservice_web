<?php
include 'conexaoAction.php'; // conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo dados do formulário agendamento_hospedagem
    $tipo = 'Hospedagem';  // Define o tipo de agendamento como 'Hospedagem'
    $pet_ID = mysqli_real_escape_string($conexao, $_POST['pet_ID']);
    $cliente_ID = mysqli_real_escape_string($conexao, $_POST['cliente_ID']);
    $checkin = mysqli_real_escape_string($conexao, $_POST['checkin']);
    $checkout = mysqli_real_escape_string($conexao, $_POST['checkout']);
    $observacoes = mysqli_real_escape_string($conexao, $_POST['observacoes']);

    // Adiciona o horário 12:00 às datas de checkin e checkout
    $checkin .= " 12:00:00";
    $checkout .= " 12:00:00";

    // Validação simples: garantir que check-in seja antes do check-out, somente para agendamentos com checkout
    if (!empty($checkout) && $checkin >= $checkout) {
        echo "<script>alert('A data de check-out deve ser posterior à de check-in.');window.location.href='agendamento_hospedagem.php';</script>";
    } else {
        // Verificar se pet_ID e cliente_ID existem nas tabelas relacionadas usando prepared statements
        $sql_verifica_pet = "SELECT id FROM pet WHERE id = ?";
        $sql_verifica_cliente = "SELECT id FROM cliente WHERE id = ?";

        // Preparar a consulta para verificar o pet
        $stmt_pet = mysqli_prepare($conexao, $sql_verifica_pet);
        mysqli_stmt_bind_param($stmt_pet, "i", $pet_ID);
        mysqli_stmt_execute($stmt_pet);
        mysqli_stmt_store_result($stmt_pet);

        // Preparar a consulta para verificar o cliente
        $stmt_cliente = mysqli_prepare($conexao, $sql_verifica_cliente);
        mysqli_stmt_bind_param($stmt_cliente, "i", $cliente_ID);
        mysqli_stmt_execute($stmt_cliente);
        mysqli_stmt_store_result($stmt_cliente);

        // Verificar se o pet ou cliente não existem
        if (mysqli_stmt_num_rows($stmt_pet) == 0) {
            echo "<script>alert('O pet selecionado não existe.');window.location.href='agendamento_hospedagem.php';</script>";
        } elseif (mysqli_stmt_num_rows($stmt_cliente) == 0) {
            echo "<script>alert('O cliente selecionado não existe.');window.location.href='agendamento_hospedagem.php';</script>";
        } else {
            // Inserir os dados na tabela de agendamentos usando prepared statement
            $sql_insert = "INSERT INTO agendamentos (tipo, start, end, pet_id, cliente_id, observacoes) 
                           VALUES (?, ?, ?, ?, ?, ?)";

            $stmt_insert = mysqli_prepare($conexao, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "sssiss", $tipo, $checkin, $checkout, $pet_ID, $cliente_ID, $observacoes);

            if (mysqli_stmt_execute($stmt_insert)) {
                echo json_encode(['status' => 'success', 'message' => 'Agendamento realizado com sucesso!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir agendamento: ' . mysqli_error($conexao)]);
            }

            // Fechar statement de inserção
            mysqli_stmt_close($stmt_insert);
        }

        // Fechar statements de verificação
        mysqli_stmt_close($stmt_pet);
        mysqli_stmt_close($stmt_cliente);
    }
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
