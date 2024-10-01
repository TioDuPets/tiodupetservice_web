<?php
include 'conexaoAction.php'; // Inclua a conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petID = $_POST['petID'];
    $clienteID = $_POST['clienteID'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $observacoes = $_POST['observacoes'];

    // Validação simples (garantir que check-in seja antes do check-out)
    if ($checkin >= $checkout) {
        echo "A data de check-out deve ser posterior à de check-in.";
    } else {
        $sql = "INSERT INTO agendamentos (pet_id, cliente_id, checkin, checkout, observacoes) 
                VALUES ('$petID', '$clienteID', '$checkin', '$checkout', '$observacoes')";

        if (mysqli_query($conn, $sql)) {
            echo "Agendamento realizado com sucesso!";
        } else {
            echo "Erro ao agendar: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
