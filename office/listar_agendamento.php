<?php
session_start();

$tempoExpiracao = 300;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $tempoExpiracao)) {
    session_unset(); 
    session_destroy(); 
    header("Location: login.php");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
include 'header.php';
include 'conexaoAction.php'; // Inclui a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="officestyle.css">
    <title>Lista de Agendamentos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4 display-4">Agendamentos</h1>
        
        <!-- Tabela para listar os agendamentos -->
        <table class="table table-bordered table-striped">
            <!--thead>
                <tr>
                    <th>ID</th>
                    <th>Data de Check-in</th>
                    <th>Data de Check-out</th>
                    <th>Pet</th>
                    <th>Cliente (Tutor)</th>
                    <th>Observações</th>
                </tr>
            </thead-->

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Agendamento</th> <!-- Nova coluna -->
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Pet</th>
                    <th>Cliente (Tutor)</th>
                    <th>Observações</th>
                </tr>
            </thead>




            <tbody>
            <?php
// Ajustando a consulta SQL para pegar os nomes a partir dos IDs
$query = "SELECT a.ID, a.tipo, a.start AS checkin, a.end AS checkout, p.nome AS pet_nome, c.nome AS cliente_nome, a.observacoes
          FROM agendamentos a
          INNER JOIN pet p ON a.pet_id = p.id
          INNER JOIN cliente c ON a.cliente_id = c.id
          ORDER BY checkin DESC;";

$result = mysqli_query($conexao, $query);

if ($result === false) {
    // Exibe o erro da consulta SQL para ajudar no debug
    echo "Erro na consulta: " . mysqli_error($conexao);
} elseif (mysqli_num_rows($result) > 0) {
    // Loop para exibir os dados
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['tipo'] . "</td>"; // Tipo de agendamento
        echo "<td>" . date('d/m/Y H:i', strtotime($row['checkin'])) . "</td>"; // Exibe data e hora do checkin
        
        echo "<td>";
        if ($row['tipo'] == 'Pet Sitter') {
            // Adiciona uma hora ao checkin para Pet Sitter
            $checkout_time = date('d/m/Y H:i', strtotime($row['checkin'] . ' +1 hour'));
            echo $checkout_time;
        } else {
            // Exibe o checkout normal, se existir
            echo ($row['checkout'] ? date('d/m/Y H:i', strtotime($row['checkout'])) : '-');
        }
        echo "</td>";
        
        // Exibe o nome do pet e do cliente a partir dos JOINs
        echo "<td>" . $row['pet_nome'] . "</td>"; // Nome do pet
        echo "<td>" . $row['cliente_nome'] . "</td>"; // Nome do cliente
        echo "<td>" . $row['observacoes'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>Nenhum agendamento encontrado</td></tr>";
}

// Fecha a conexão
mysqli_close($conexao);
?>

            </tbody>
        </table>
    </div>
</body>

<?php
include 'footer.php';
?>
</html>
