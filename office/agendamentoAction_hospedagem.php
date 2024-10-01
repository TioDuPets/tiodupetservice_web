<?php
include 'conexaoAction.php'; // Inclua a conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_ID = $_POST['pet_ID'];
    $cliente_ID = $_POST['cliente_ID'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $observacoes = $_POST['observacoes'];

    // Validação simples (garantir que check-in seja antes do check-out)
    if ($checkin >= $checkout) {
        echo "A data de check-out deve ser posterior à de check-in.";
    } else {
        $sql = "INSERT INTO agendamentos (pet_id, cliente_id, checkin, checkout, observacoes) 
                VALUES ('$pet_ID', '$cliente_ID', '$checkin', '$checkout', '$observacoes')";

        if (mysqli_query($conexao, $sql)) {
            echo "Agendamento realizado com sucesso!";
        } else {
            echo "Erro ao agendar: " . mysqli_error($conexao);
        }
    }
}

mysqli_close($conexao);
?>
