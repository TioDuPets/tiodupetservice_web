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
        <title>Listagem de Pets</title>
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
<div class="container mt-5">
            <h1 class="text-center mb-4 display-4">Listagem de Pets</h1>
            <table class="table table-sm table-striped table-hover border-primary">
            <thead class="table-primary">
                    <tr>
                        <th>Código</th>
                        <th>Nome Pet</th>
                        <th>RGA</th>
                        <th>Sexo</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Cor</th>
                        <th>Idade</th>
                        <th>Porte</th>
                        <th>Excluir</th>
                        <th scope="col">Atualizar</th>
                    </tr>
                </thead>
                <tbody>
        </div>
    </div>';

$sql = "SELECT * FROM pet";
$resultado = $conexao->query($sql);
if ($resultado != null) {
    foreach ($resultado as $linha) {
        echo '<tr>';
        echo '<td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['nome'] . '</td>';
        echo '<td>' . $linha['rga'] . '</td>';
        echo '<td>' . $linha['sexo'] . '</td>';
        echo '<td>' . $linha['especie'] . '</td>';
        echo '<td>' . $linha['raca'] . '</td>';
        echo '<td>' . $linha['cor'] . '</td>';
        echo '<td>' . $linha['idade'] . '</td>';
        echo '<td>' . $linha['porte'] . '</td>';
        
        echo '<td>
                <a href="excluir_pet.php?id=' . $linha['id'] . '&nome=' . $linha['nome'] . '&rga=' . $linha['rga'] . '&sexo=' . $linha['sexo'] . '&especie=' . $linha['especie'] . '&raca=' . $linha['raca'] . '&cor=' . $linha['cor'] . '&idade=' . $linha['idade'] . '&porte=' . $linha['porte'] . '">
                    <i class="fa fa-user-times"></i>
                </a>
              </td>';
        
        echo '<td>
                <a href="atualizar_pet.php?id=' . $linha['id'] . '&nome=' . $linha['nome'] . '&rga=' . $linha['rga'] . '&sexo=' . $linha['sexo'] . '&especie=' . $linha['especie'] . '&raca=' . $linha['raca'] . '&cor=' . $linha['cor'] . '&idade=' . $linha['idade'] . '&porte=' . $linha['porte'] . '">
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