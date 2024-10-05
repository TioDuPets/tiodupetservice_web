<?php
// Incluir a conexão com o banco de dados
include 'conexaoAction.php';

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Receber os dados do formulário
    $id = $_POST['id'];
    $id_pet = $_POST['id_pet'];
    $id_cliente = $_POST['id_cliente'];
    $id_veterinario = $_POST['id_veterinario'];
    $id_servico = $_POST['id_servico'];
    $data_matricula = $_POST['data_matricula'];
    $status = $_POST['status'];
    $horario_entrada = $_POST['horario_entrada'];
    $horario_saida = $_POST['horario_saida'];
    $data_fim = $_POST['data_fim'];
    $observacao = $_POST['observacao'];

    // Montar a query de atualização
    $sql = "UPDATE matricula_creche 
            SET id_pet = ?, 
                id_cliente = ?, 
                id_veterinario = ?, 
                id_servico = ?, 
                data_matricula = ?, 
                status = ?, 
                horario_entrada = ?, 
                horario_saida = ?, 
                data_fim = ?, 
                observacao = ?
            WHERE id = ?";

    // Preparar a declaração SQL
    if ($stmt = $conexao->prepare($sql)) {
        
        // Vincular os parâmetros aos valores
        $stmt->bind_param(
            'iiisssssssi', 
            $id_pet, 
            $id_cliente, 
            $id_veterinario, 
            $id_servico, 
            $data_matricula, 
            $status, 
            $horario_entrada, 
            $horario_saida, 
            $data_fim, 
            $observacao, 
            $id
        );
        
        // Executar a query
        if ($stmt->execute()) {
            // Redirecionar para a página de sucesso ou consulta após a atualização
            header("Location: matricula_consulta_creche.php?mensagem=atualizado");
            exit();
        } else {
            // Exibir mensagem de erro em caso de falha
            echo "Erro ao atualizar a matrícula: " . $conexao->error;
        }

        // Fechar a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    // Redirecionar se o arquivo for acessado diretamente
    header("Location: consulta_matricula_creche.php");
    exit();
}
?>
