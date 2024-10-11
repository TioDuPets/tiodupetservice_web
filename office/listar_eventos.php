<?php
// Conexão com o banco de dados
include 'conexaoAction.php';

// Definindo o cabeçalho como JSON
header('Content-Type: application/json');

// Consulta para buscar os eventos de agendamento na tabela "agendamentos"
$query = "
    SELECT a.id, a.start AS inicio, a.end AS fim, p.nome AS pet_nome, c.nome AS cliente_nome 
    FROM agendamentos a
    INNER JOIN pet p ON a.pet_id = p.id
    INNER JOIN cliente c ON a.cliente_id = c.id
";

$result = mysqli_query($conexao, $query);

$eventos = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Adiciona cada evento ao array de eventos
        $eventos[] = array(
            'id' => $row['id'],
            'title' => $row['pet_nome'] . " - " . $row['cliente_nome'], // Nome do pet e cliente no título do evento
            'start' => $row['inicio'], // Data de início (start)
            'end' => $row['fim'] // Data de fim (end)
        );
    }
}

// Retorna os eventos no formato JSON
echo json_encode($eventos);

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
