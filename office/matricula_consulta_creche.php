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
    <title>Consulta de Matrículas Creche</title>
</head>
<body>

<section>
    <div class="container-centered">
        <div class="form-container bg-light p-4 rounded shadow">
            <h1 class="text-center mb-4 display-4">Consulta de Matrículas na Creche</h1>
            
            <!-- Formulário de pesquisa -->
            <form method="GET" action="">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="id_pet" class="form-label">Nome do Pet</label>
                        <input type="text" class="form-control" id="id_pet" name="id_pet" placeholder="Nome do Pet">
                    </div>
                    <div class="col-md-3">
                        <label for="id_cliente" class="form-label">Nome do Cliente</label>
                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="Nome do Cliente">
                    </div>
                    <div class="col-md-3">
                        <label for="id_veterinario" class="form-label">Nome do Veterinário</label>
                        <input type="text" class="form-control" id="id_veterinario" name="id_veterinario" placeholder="Nome do Veterinário">
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="id_servico" class="form-label">Serviço</label>
                        <input type="text" class="form-control" id="id_servico" name="id_servico" placeholder="Serviço">
                    </div>
                    <div class="col-md-3">
                        <label for="data_matricula" class="form-label">Data da Matrícula</label>
                        <input type="date" class="form-control" id="data_matricula" name="data_matricula">
                    </div>
                    <div class="col-md-3 align-self-end">
                        <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
                    </div>
                </div>
            </form>

            <!-- Tabela de resultados -->
            <table class="table table-sm table-striped table-hover border-primary">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Pet</th>
                        <th>Cliente</th>
                        <th>Veterinário</th>
                        <th>Serviço</th>
                        <th>Status</th>
                        <th>Data Matrícula</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conexão com o banco de dados
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "db_tiodupetservice";
                    $conexao = new mysqli($servername, $username, $password, $dbname);

                    if ($conexao->connect_error) {
                        die("Connection failed: " . $conexao->connect_error);
                    }

                    // Construção da query de busca
                    $sql = "SELECT matricula_creche.*, pet.nome AS nome_pet, cliente.nome AS nome_cliente, veterinario.nome AS nome_veterinario, servico.nome AS nome_servico
                            FROM matricula_creche
                            JOIN pet ON matricula_creche.id_pet = pet.id
                            JOIN cliente ON matricula_creche.id_cliente = cliente.id
                            JOIN veterinario ON matricula_creche.id_veterinario = veterinario.id
                            JOIN servico ON matricula_creche.id_servico = servico.id
                            WHERE 1=1";

                    // Filtrando a pesquisa pelos campos
                    if (isset($_GET['id_pet']) && $_GET['id_pet'] != '') {
                        $id_pet = $_GET['id_pet'];
                        $sql .= " AND pet.nome LIKE '%$id_pet%'";
                    }

                    if (isset($_GET['id_cliente']) && $_GET['id_cliente'] != '') {
                        $id_cliente = $_GET['id_cliente'];
                        $sql .= " AND cliente.nome LIKE '%$id_cliente%'";
                    }

                    if (isset($_GET['id_veterinario']) && $_GET['id_veterinario'] != '') {
                        $id_veterinario = $_GET['id_veterinario'];
                        $sql .= " AND veterinario.nome LIKE '%$id_veterinario%'";
                    }

                    if (isset($_GET['status']) && $_GET['status'] != '') {
                        $status = $_GET['status'];
                        $sql .= " AND matricula_creche.status = '$status'";
                    }

                    if (isset($_GET['id_servico']) && $_GET['id_servico'] != '') {
                        $id_servico = $_GET['id_servico'];
                        $sql .= " AND servico.nome LIKE '%$id_servico%'";
                    }

                    if (isset($_GET['data_matricula']) && $_GET['data_matricula'] != '') {
                        $data_matricula = $_GET['data_matricula'];
                        $sql .= " AND matricula_creche.data_matricula = '$data_matricula'";
                    }

                    $resultado = $conexao->query($sql);

                    // Exibindo os resultados da consulta
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $linha['id'] . "</td>";
                            echo "<td>" . $linha['nome_pet'] . "</td>";
                            echo "<td>" . $linha['nome_cliente'] . "</td>";
                            echo "<td>" . $linha['nome_veterinario'] . "</td>";
                            echo "<td>" . $linha['nome_servico'] . "</td>";
                            echo "<td>" . $linha['status'] . "</td>";
                            echo "<td>" . $linha['data_matricula'] . "</td>";
                            echo '<td><a href="matricula_atualizar_creche.php?id=' . $linha['id'] . '"><i class="fa fa-refresh"></i> Atualizar</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>Nenhuma matrícula encontrada.</td></tr>";
                    }

                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

</body>
<?php
include 'footer.php';
?>
</html>
