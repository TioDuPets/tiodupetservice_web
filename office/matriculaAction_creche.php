<?php
include 'conexaoAction.php';

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_servico = $_POST['id_servico'];
    $id_pet = $_POST['id_pet'];
    $id_veterinario = $_POST['id_veterinario'];
    $id_cliente = $_POST['id_cliente'];
    $data_matricula = $_POST['data_matricula'];
    $status = $_POST['status'];
    $horario_entrada = $_POST['horario_entrada'];
    $horario_saida = $_POST['horario_saida'];
    $observacao = $_POST['observacao'];

    // Calculando a data de término (366 dias após a matrícula)
    $data_fim = date('Y-m-d', strtotime($data_matricula . ' + 366 days'));

    // Inserindo os dados na tabela de matrícula, incluindo data_fim
    $sql_matricula = "INSERT INTO matricula_creche (id_servico, id_pet, id_veterinario, id_cliente, data_matricula, status, horario_entrada, horario_saida, observacao, data_fim) 
                      VALUES ('$id_servico', '$id_pet', '$id_veterinario', '$id_cliente', '$data_matricula', '$status', '$horario_entrada', '$horario_saida', '$observacao', '$data_fim')";

    // Define o cabeçalho para resposta JSON
    header('Content-Type: application/json');

    // Validação e inserção da matrícula
    if (mysqli_query($conexao, $sql_matricula)) {
        // Retorna uma resposta JSON de sucesso
        echo json_encode(['status' => 'success', 'message' => 'Matrícula realizada com sucesso!']);
    } else {
        // Retorna uma resposta JSON de erro
        echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir matrícula: ' . mysqli_error($conexao)]);
    }
}
?>
