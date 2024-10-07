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
                
                <!-- Formulário de pesquisa -->
                <form method="GET" action="">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="pet" class="form-label">Nome do Pet</label>
                            <input type="text" class="form-control" id="pet" name="pet" placeholder="Digite o nome do pet">
                        </div>
                        <div class="col-md-3">
                            <label for="cliente" class="form-label">Nome do Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Digite o nome do cliente">
                        </div>
                        <div class="col-md-3">
                            <label for="veterinario" class="form-label">Nome do Veterinário</label>
                            <input type="text" class="form-control" id="veterinario" name="veterinario" placeholder="Digite o nome do veterinário">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Selecione</option>
                                <option value="Ativa">Ativa</option>
                                <option value="Inativa">Inativa</option>
                            </select>
                        </div>
                        <div class="row mt-4">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-50">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </form>';

// Verificando se há pesquisa a ser realizada
if (!isset($_GET['pet']) && !isset($_GET['cliente']) && !isset($_GET['veterinario']) && !isset($_GET['status'])) {
    echo '<div class="alert alert-info text-center">Aguardando pesquisa...</div>';
} else {
    // Construindo a query SQL com filtros dinâmicos
    $sql = "SELECT m.id, p.nome AS nome_pet, v.nome AS nome_veterinario, c.nome AS nome_cliente, 
            m.data_matricula, m.status
            FROM matricula_creche m
            JOIN pet p ON m.id_pet = p.id
            JOIN veterinario v ON m.id_veterinario = v.id
            JOIN cliente c ON m.id_cliente = c.id
            WHERE 1=1";

    // Filtros dinâmicos
    if (!empty($_GET['pet'])) {
        $pet = $conexao->real_escape_string($_GET['pet']);
        $sql .= " AND p.nome LIKE '%$pet%'";
    }

    if (!empty($_GET['cliente'])) {
        $cliente = $conexao->real_escape_string($_GET['cliente']);
        $sql .= " AND c.nome LIKE '%$cliente%'";
    }

    if (!empty($_GET['veterinario'])) {
        $veterinario = $conexao->real_escape_string($_GET['veterinario']);
        $sql .= " AND v.nome LIKE '%$veterinario%'";
    }

    if (!empty($_GET['status'])) {
        $status = $conexao->real_escape_string($_GET['status']);
        $sql .= " AND m.status = '$status'";
    }

    $resultado = $conexao->query($sql);

    // Exibindo os resultados
    if ($resultado && $resultado->num_rows > 0) {
        echo '
        <table class="table table-sm table-striped table-hover border-primary mt-4">
            <thead class="table-primary">
                <tr>
                    <th>Pet</th>
                    <th>Cliente</th>
                    <th>Veterinário</th>
                    <th>Data Matrícula</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
            </thead>
            <tbody>';
        while ($linha = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $linha['nome_pet'] . '</td>';
            echo '<td>' . $linha['nome_cliente'] . '</td>';
            echo '<td>' . $linha['nome_veterinario'] . '</td>';
            echo '<td>' . $linha['data_matricula'] . '</td>';
            echo '<td>' . $linha['status'] . '</td>';
            echo '<td>
                    <a href="matricula_atualizar_creche.php?id=' . $linha['id'] . '">
                        <i class="fa fa-refresh"></i>
                    </a>
                  </td>';
            echo '</tr>';
        }
        echo '
            </tbody>
        </table>';
    } else {
        echo '<div class="alert alert-warning text-center">Nenhuma matrícula encontrada.</div>';
    }
}

echo '
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
