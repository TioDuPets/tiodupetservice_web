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
        <title>Listagem de Serviços</title>
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
                            <h1 class="text-center">Listagem de Serviços</h1>
                            <table class="table table-striped table-hover">
                             <thead>
                              <tr>
                               <th>Código</th>
                               <th>Serviço</th>
                               <th>Tipo</th>
                               <th>Preço</th>
                               <th>Excluir</hd>
                               <th>Atualizar</th>
                               </tr>
                             <thead>
                        </div>
                    </div>
                </section> ';

        $sql = "SELECT * FROM servico";
        $resultado = $conexao->query($sql);
        if ($resultado != null)
            foreach ($resultado as $linha) {
                echo '<tr>';
                echo '<td>' . $linha['id'] . '</td>';
                echo '<td>' . $linha['servico'] . '</td>';
                echo '<td>' . $linha['tipo'] . '</td>';
                echo '<td>' . $linha['preco'] . '</td>';
                echo '<td><a href="excluir_servico.php?id=' . $linha['id'] .
                                             '&servico=' . $linha['servico'] .
                                              '&tipo=' . $linha['tipo'] .
                                               '&preco=' . $linha['preco'] .
                                                     '"><i class="fa fa-user-times"></i></a></td></td>';
                echo '<td><a href="atualizar_servico.php?id=' . $linha['id'] .
                                             '&servico=' . $linha['servico'] .
                                              '&tipo=' . $linha['tipo'] .
                                               '&preco=' . $linha['preco'] .
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
    <?php
include 'footer.php';
?>
    </html>