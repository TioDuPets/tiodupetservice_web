<?php
// Inclui a conexão com o banco de dados
include 'conexaoAction.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recebe os dados do formulário
    $data_hora = mysqli_real_escape_string($conexao, $_POST['data_hora']);
    $petID = mysqli_real_escape_string($conexao, $_POST['petID']);
    $clienteID = mysqli_real_escape_string($conexao, $_POST['clienteID']);
    $observacoes = mysqli_real_escape_string($conexao, $_POST['observacoes']);

    // Validação básica para garantir que os campos obrigatórios foram preenchidos
    if (!empty($data_hora) && !empty($petID) && !empty($clienteID)) {
        
        // Cria a consulta SQL para inserir os dados no banco
        $sql = "INSERT INTO agendamento_petsitter (data_hora, pet_id, cliente_id, observacoes) 
                VALUES ('$data_hora', '$petID', '$clienteID', '$observacoes')";

        // Executa a consulta e verifica se a inserção foi bem-sucedida
        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Agendamento realizado com sucesso!');window.location.href='agendamento_petsitter.php';</script>";
        } else {
            echo "<script>alert('Erro ao agendar. Por favor, tente novamente.');window.location.href='agendamento_petsitter.php';</script>";
        }

    } else {
        // Mensagem de erro caso algum campo obrigatório esteja vazio
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');window.location.href='agendamento_petsitter.php';</script>";
    }
    
} else {
    // Redireciona de volta para a página de agendamento se o método de requisição não for POST
    header("Location: agendamento_petsitter.php");
    exit();
}
?>
