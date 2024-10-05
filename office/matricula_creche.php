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
    <title>Matrícula Creche</title>
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

// Supondo que o ID do pet e do cliente sejam passados via GET
$id_pet = $_GET['id_pet'];
$id_cliente = $_GET['id_cliente'];

// Buscando informações do pet
$sql_pet = "SELECT * FROM pet WHERE id = $id_pet";
$resultado_pet = $conexao->query($sql_pet);
$pet = $resultado_pet->fetch_assoc();

// Buscando informações do cliente
$sql_cliente = "SELECT * FROM cliente WHERE id = $id_cliente";
$resultado_cliente = $conexao->query($sql_cliente);
$cliente = $resultado_cliente->fetch_assoc();

echo ' 
<section>
    <div class="container-centered">
        <div class="form-container">
            <div class="bg-light p-4 rounded shadow">
                <h1 class="text-center mb-4 display-4">Confirmação de Matrícula</h1>
                <h2>Informações do Pet</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>' . $pet['id'] . '</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>' . $pet['nome'] . '</td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td>' . $pet['sexo'] . '</td>
                    </tr>
                    <tr>
                        <th>Espécie</th>
                        <td>' . $pet['especie'] . '</td>
                    </tr>
                    <tr>
                        <th>Raça</th>
                        <td>' . $pet['raca'] . '</td>
                    </tr>
                    <tr>
                        <th>Cor</th>
                        <td>' . $pet['cor'] . '</td>
                    </tr>
                    <tr>
                        <th>Idade</th>
                        <td>' . $pet['idade'] . '</td>
                    </tr>
                    <tr>
                        <th>Porte</th>
                        <td>' . $pet['porte'] . '</td>
                    </tr>
                    <tr>
                        <th>RGA</th>
                        <td>' . $pet['rga'] . '</td>
                    </tr>
                </table>
                
                <h2>Informações do Cliente</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>' . $cliente['id'] . '</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>' . $cliente['nome'] . '</td>
                    </tr>
                    <tr>
                        <th>CPF</th>
                        <td>' . $cliente['cpf'] . '</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>' . $cliente['telefone'] . '</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>' . $cliente['email'] . '</td>
                    </tr>
                    <tr>
                        <th>Endereço</th>
                        <td>' . $cliente['endereco'] . ', ' . $cliente['numero'] . ' ' . $cliente['complemento'] . ', ' . $cliente['bairro'] . ', ' . $cliente['cep'] . ', ' . $cliente['cidade'] . ' - ' . $cliente['estado'] . '</td>
                    </tr>
                </table>

                <form action="processar_matricula.php" method="post">
                    <input type="hidden" name="id_pet" value="' . $pet['id'] . '">
                    <input type="hidden" name="id_cliente" value="' . $cliente['id'] . '">
                    <button type="submit" class="btn btn-primary">Confirmar Matrícula</button>
                </form>
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
