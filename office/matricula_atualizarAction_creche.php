<?php
include 'conexaoAction.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $id_servico = $_POST['id_servico'];
    $id_pet = $_POST['id_pet'];
    $id_veterinario = $_POST['id_veterinario'];
    $id_cliente = $_POST['id_cliente'];
    $data_matricula = $_POST['data_matricula'];
    $status = $_POST['status'];
    $horario_entrada = $_POST['horario_entrada'];
    $horario_saida = $_POST['horario_saida'];
    $data_fim = $_POST['data_fim'];
    $observacao = $_POST['observacao'];

    $sql = "UPDATE matricula_creche SET 
                id_servico='$id_servico', 
                id_pet='$id_pet', 
                id_veterinario='$id_veterinario', 
                id_cliente='$id_cliente', 
                data_matricula='$data_matricula',
                status='$status',
                horario_entrada='$horario_entrada',
                horario_saida='$horario_saida',
                data_fim='$data_fim',
                observacao='$observacao' 
            WHERE id='$id'";

    if ($conexao->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Matrícula atualizada com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar matrícula: ' . $conexao->error]);
    }

    $conexao->close();
}
?>
