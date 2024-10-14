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

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitiza os dados recebidos
    $servico = $conexao->real_escape_string($_POST['serviceTypeInput']);
    $nome = $conexao->real_escape_string($_POST['txtNome']);
    $telefone = $conexao->real_escape_string($_POST['txtTelefone']);
    $email = $conexao->real_escape_string($_POST['txtEmail']);
    $contato_prefere = $conexao->real_escape_string($_POST['contato']);
    $horario_prefere = $conexao->real_escape_string($_POST['horario']);
    $receber_novidades = isset($_POST['receber_novidades']) ? 1 : 0;
    $consentimento_dados = isset($_POST['autorizacao']) ? 1 : 0;
    $politica_privacidade = 'https://link-da-politica-de-privacidade.com'; // Link fixo para a política de privacidade
	$lead_contatado = $conexao->real_escape_string($_POST['lead_contatado']);

    // Gera a data e hora atual no formato adequado
    $data_lead = date('Y-m-d H:i:s');
	$data_consentimento = date('Y-m-d H:i:s');
	$lead_contatado = 'Não'; // Define como "Não" de forma fixa


    // Prepara a instrução SQL com placeholders (evita SQL Injection)
    $stmt = $conexao->prepare("INSERT INTO lead (servico, data_lead, nome, telefone, email, contato_prefere, horario_prefere, receber_novidades, consentimento_dados, data_consentimento, politica_privacidade, lead_contatado) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Verifica se a preparação foi bem-sucedida
    if (!$stmt) {
        die(json_encode(['status' => 'error', 'message' => 'Erro ao preparar a consulta: ' . $conexao->error]));
    }

    // Liga os parâmetros à consulta preparada
    $stmt->bind_param("ssssssssisss", $servico, $data_lead, $nome, $telefone, $email, $contato_prefere, $horario_prefere, $receber_novidades, $consentimento_dados, $data_consentimento, $politica_privacidade, $lead_contatado);

    // Executa a consulta e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Agendamento efetuado com sucesso!!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao efetuar Agendamento: ' . $stmt->error]);
    }

    // Fecha a consulta e a conexão
    $stmt->close();
    $conexao->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de solicitação inválido.']);
}
?>
