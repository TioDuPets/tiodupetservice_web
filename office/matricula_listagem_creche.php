<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Consulta de Matrículas na Creche</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tiodupetservice";
$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

echo '
<section>
    <div class="container-centered">
        <div class="form-container">
            <div class="bg-light p-4 rounded shadow">
                <h1 class="text-center mb-4 display-4">Consulta de Matrículas na Creche</h1>
                <table class="table table-sm table-striped table-hover border-primary">
                    <thead class="table-primary">
                        <tr>
                            <th>Pet</th>
                            <th>Cliente</th>
                            <th>Veterinário</th>
                            <th>Data de Matrícula</th>
                            <th>Status</th>
                            <th>Observação</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>';

$sql = "SELECT m.id, s.servico, p.nome AS nome_pet, v.nome AS nome_veterinario, c.nome AS nome_cliente, 
        m.data_matricula, m.status, m.horario_entrada, m.horario_saida, m.data_fim, m.observacao
        FROM matricula_creche m
        JOIN servico s ON m.id_servico = s.id
        JOIN pet p ON m.id_pet = p.id
        JOIN veterinario v ON m.id_veterinario = v.id
        JOIN cliente c ON m.id_cliente = c.id";

$resultado = $conexao->query($sql);

if ($resultado != null) {
    foreach ($resultado as $linha) {
        echo '<tr>';
        echo '<td>' . $linha['nome_pet'] . '</td>';
        echo '<td>' . $linha['nome_veterinario'] . '</td>';
        echo '<td>' . $linha['nome_cliente'] . '</td>';
        echo '<td>' . $linha['data_matricula'] . '</td>';
        echo '<td>' . $linha['status'] . '</td>';
        echo '<td>' . $linha['observacao'] . '</td>';

        echo '<td>
                <a href="matricula_atualizar_creche.php?id=' . $linha['id'] . '">
                    <i class="fa fa-refresh"></i>
                </a>
              </td>';
        echo '</tr>';
    }
}

echo '
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>';

$conexao->close();
?>

</body>
<?php
include 'footer.php';
?>
</html>
