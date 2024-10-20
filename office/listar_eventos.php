<?php
// Conexão com o banco de dados
include 'conexaoAction.php';

// Definindo o cabeçalho como JSON
header('Content-Type: application/json');

// Consulta para buscar os eventos de agendamento na tabela "agendamentos"
$query = "
    SELECT a.id, a.start AS inicio, a.end AS fim, p.nome AS pet_nome, c.nome AS cliente_nome, a.tipo 
    FROM agendamentos a
    INNER JOIN pet p ON a.pet_id = p.id
    INNER JOIN cliente c ON a.cliente_id = c.id
";

// Executa a consulta
$result = mysqli_query($conexao, $query);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    // Exibe o erro da consulta
    echo json_encode(['error' => mysqli_error($conexao)]);
    exit;
}

// Verifica se há resultados
$eventos = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Define a classe CSS baseada no tipo de evento
        $className = '';
        if ($row['tipo'] == 'Pet Sitter') {
            $className = 'evento-pet-sitter'; // Classe CSS para Pet Sitter
        } elseif ($row['tipo'] == 'Hospedagem') {
            $className = 'evento-hospedagem'; // Classe CSS para Hospedagem
        }

        $eventos[] = array(
            'id' => $row['id'],
            'title' => $row['pet_nome'] . " - " . $row['cliente_nome'],
            'start' => $row['inicio'],
            'end' => $row['fim'],
            'classNames' => [$className]
        );
    }
}

// Retorna os eventos no formato JSON
echo json_encode($eventos);

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
<script>
    
    </script>