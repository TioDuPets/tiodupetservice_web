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

    if (mysqli_query($conexao, $sql_matricula)) {
        // Pegando o último ID da matrícula inserida
        $matricula_id = mysqli_insert_id($conexao);

        echo "Matrícula realizada com sucesso!";
    } else {
        echo "Erro ao inserir matrícula: " . mysqli_error($conexao);
    }
}
?>
