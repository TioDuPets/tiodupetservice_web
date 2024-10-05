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
    <title>Listagem de Avaliações</title>
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
                <h1 class="text-center mb-4 display-4">Listagem de Avaliações</h1>
                <table class="table table-sm table-striped table-hover border-primary">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nome do Avaliador</th>
                            <th>Estrelas</th>
                            <th>Descrição</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>';

$sql = "SELECT * FROM avaliacao_solicitadas";
$resultado = $conexao->query($sql);
if ($resultado != null) {
    foreach ($resultado as $linha) {
        echo '<tr>';
        echo '<td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['nome_avaliador'] . '</td>';
        echo '<td>' . str_repeat('⭐', $linha['estrelas']) . '</td>'; // Exibe estrelas
        echo '<td>' . $linha['descricao'] . '</td>';
        
        // Adicione links para excluir e atualizar conforme necessário
        echo '<td>
                <a href="excluir_avaliacao.php?id=' . $linha['id'] . '">
                    <i class="fa fa-user-times"></i>
                </a>
              </td>';
        
        echo '<td>
                <a href="atualizar_avaliacao.php?id=' . $linha['id'] . '">
                    <i class="fa fa-refresh"></i>
                </a>
              </td>';
        
        echo '</tr>';
    }
}

echo '          </tbody>
            </table>
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
