<?php
include 'conexaoAction.php'; // Inclui a conexão com o banco

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $id_servico = $_POST['id_servico'];
    $id_pet = $_POST['id_pet'];
    $id_veterinario = $_POST['id_veterinario'];
    $id_cliente = $_POST['id_cliente'];
    $data_matricula = $_POST['data_matricula'];
    $status = $_POST['status'];
    $horario_entrada = $_POST['horario_entrada'];
    $horario_saida = $_POST['horario_saida'];
    $data_fim = !empty($_POST['data_fim']) ? $_POST['data_fim'] : null;
    $observacao = !empty($_POST['observacao']) ? $_POST['observacao'] : null;

    // Valida os dados obrigatórios (exemplo básico)
    if (empty($id_servico) || empty($id_pet) || empty($id_veterinario) || empty($id_cliente) || empty($data_matricula) || empty($status) || empty($horario_entrada) || empty($horario_saida)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Prepara a consulta SQL para inserção
        $sql = "INSERT INTO matricula_creche (id_servico, id_pet, id_veterinario, id_cliente, data_matricula, status, horario_entrada, horario_saida, data_fim, observacao) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepara a declaração
        if ($stmt = mysqli_prepare($conexao, $sql)) {
            // Faz o bind dos parâmetros
            mysqli_stmt_bind_param($stmt, "iiisssssss", $id_servico, $id_pet, $id_veterinario, $id_cliente, $data_matricula, $status, $horario_entrada, $horario_saida, $data_fim, $observacao);

            // Executa a declaração
            if (mysqli_stmt_execute($stmt)) {
                echo "Matrícula realizada com sucesso!";
                // Redireciona para outra página, se necessário
                // header("Location: sucesso.php");
            } else {
                echo "Erro ao realizar a matrícula: " . mysqli_error($conexao);
            }

            // Fecha a declaração
            mysqli_stmt_close($stmt);
        } else {
            echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
        }
    }

    // Fecha a conexão
    mysqli_close($conexao);
}
?>
