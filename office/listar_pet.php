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
    <style>

    .table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;

    margin: 1px 0;
    font-size: 18px;
    background-color: #f8f9fa;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    font-family: arial;
    text-align: center;
}

.table th {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #fff;
    background-color: #007bff;
    color: white;

}



    </style>
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
                            <h1 class="text-center">Listagem de Pets</h1>
                            <table class="table table-striped table-hover">
                             <thead>
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
                               <th>Excluir</hd>
                               <th>Atualizar</th>
                               </tr>
                             <thead>
                        </div>
                    </div>
                </section> ';

        $sql = "SELECT * FROM pet";
        $resultado = $conexao->query($sql);
        if ($resultado != null)
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

                echo '<td><a href="excluir_pet.php?id=' . $linha['id'] .
                                             '&nome=' . $linha['nome'] .
                                             '&rga=' . $linha['rga'] .
                                              '&sexo=' . $linha['sexo'] .
                                               '&especie=' . $linha['especie'] .
                                                '&raca=' . $linha['raca'] .
                                                 '&cor=' . $linha['cor'] .
                                                  '&idade=' . $linha['idade'] .
                                                   '&porte=' . $linha['porte'] .
                                                     '"><i class="fa fa-user-times"></i></a></td></td>';
                echo '<td><a href="atualizar_pet.php?id=' . $linha['id'] .
                                             '&nome=' . $linha['nome'] .
                                              '&rga=' . $linha['rga'] .
                                              '&sexo=' . $linha['sexo'] .
                                               '&especie=' . $linha['especie'] .
                                                '&raca=' . $linha['raca'] .
                                                 '&cor=' . $linha['cor'] .
                                                  '&idade=' . $linha['idade'] .
                                                   '&porte=' . $linha['porte'] .
                                                     '"><i class="fa fa-refresh"></i></a></td></td>';
 
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