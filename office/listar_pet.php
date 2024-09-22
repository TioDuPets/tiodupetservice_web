<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <div class="w3-paddingw3-content w3-half w3-display-topmiddle w3-margin"> 
                            <h1 class="w3-center w3-teal w3-round-large w3-margin">Listagem de Pets</h1>
                             <table class="w3-table-all w3-centered"> 
                             <thead>
                              <tr class="w3-center w3-teal">
                               <th>Código</th>
                                <th>Nome Pet</th>
                                 <th>Sexo</th>
                                 <th>Espécie</th>
                                    <th>Raça</th>
                                        <th>Cor</th>
                                            <th>Idade</th>
                                                <th>Porte</th>
                                                    <th>RGA</th>
                                                      <th>Excluir</th>
                                                        <th>Atualizar</th>
                                                         </tr> 
                                     <thead> ';
        $sql = "SELECT * FROM pet";
        $resultado = $conexao->query($sql);
        if ($resultado != null)
            foreach ($resultado as $linha) {
                echo '<tr>';
                echo '<td>' . $linha['id'] . '</td>';
                echo '<td>' . $linha['nome'] . '</td>';
                echo '<td>' . $linha['sexo'] . '</td>';
                echo '<td>' . $linha['especie'] . '</td>';
                echo '<td>' . $linha['raca'] . '</td>';
                echo '<td>' . $linha['cor'] . '</td>';
                echo '<td>' . $linha['idade'] . '</td>';
                echo '<td>' . $linha['porte'] . '</td>';
                echo '<td>' . $linha['rga'] . '</td>';
                echo '<td><a href="excluir_pet.php?id=' . $linha['id'] . '&nome=' . $linha['nome'] . '&sexo=' . $linha['sexo'] . '&especie=' . $linha['especie'] . '&raca=' . $linha['raca'] . '&cor=' . $linha['cor'] . '&idade=' . $linha['idade'] . '&porte=' . $linha['porte'] . '&rga=' . $linha['rga'] . '"><i class="fa fa-user-times w3-large w3-text-teal"></i></a></td></td>';
                echo '<td><a href="atualizar_pet.php?id=' . $linha['id'] . '&nome=' . $linha['nome'] . '&sexo=' . $linha['sexo'] . '&especie=' . $linha['especie'] . '&raca=' . $linha['raca'] . '&cor=' . $linha['cor'] . '&idade=' . $linha['idade'] . '&porte=' . $linha['porte'] . '&rga=' . $linha['rga'] . '"><i class="fa fa-refresh w3-large w3-text-teal""></i></a></td></td>';
 
                echo '</tr>';
            }
        echo ' 
       </table>
        </div>';
        $conexao->close();
        ?>
        </div>
    </body>
    </html>