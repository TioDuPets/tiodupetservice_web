<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";

// Cria a conexão com o banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Falha na conexão com o banco de dados: ' . $conexao->connect_error]));
}

// Prepara a consulta SQL para atualizar o lead
$stmt = $conexao->prepare("UPDATE lead SET 
                                nome = ?, 
                                servico = ?, 
                                telefone = ?, 
                                email = ?, 
                                data_lead = ?, 
                                contato_prefere = ?, 
                                horario_prefere = ?, 
                                receber_novidades = ?, 
                                consentimento_dados = ?, 
                                data_consentimento = ?, 
                                politica_privacidade = ?, 
                                lead_contatado = ? 
                            WHERE id = ?");

// Obtém os valores do formulário
$nome = $_POST['nome'];
$servico = $_POST['servico'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data_lead = $_POST['data_lead'];
$contato_prefere = $_POST['contato_prefere'];
$horario_prefere = $_POST['horario_prefere'];
$receber_novidades = isset($_POST['receber_novidades']) ? 1 : 0; // checkbox: 1 para marcado, 0 para não marcado
$consentimento_dados = isset($_POST['consentimento_dados']) ? 1 : 0;
$data_consentimento = $_POST['data_consentimento'];
$politica_privacidade = isset($_POST['politica_privacidade']) ? 1 : 0;
$lead_contatado = $_POST['lead_contatado'];
$id = (int)$_POST['txtID']; // Obtém o ID do lead a ser atualizado

// Associa os parâmetros à consulta
$stmt->bind_param("ssssssssssssi", 
    $nome, 
    $servico, 
    $telefone, 
    $email, 
    $data_lead, 
    $contato_prefere, 
    $horario_prefere, 
    $receber_novidades, 
    $consentimento_dados, 
    $data_consentimento, 
    $politica_privacidade, 
    $lead_contatado, 
    $id
);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Lead atualizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
