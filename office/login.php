<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o usuário e a senha são corretos
    if ($username === 'admin' && $password === 'admin') {
        // Redireciona para a tela de cadastro
        header('Location: main.php');
        exit;
    } else {
        $error = "Usuário ou senha incorretos. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css"> <!-- Seu arquivo de estilo -->
    <title>Tio Du Pets - Login</title>
</head>

<body> 
<body>
    <div class="container-centered">
        <div class="form-container">
            <h1 class="text-center mb-4 display-4">Login</h1>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label"><b>Usuário</b></label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"><b>Senha</b></label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-sign-in"></i> Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</body>


</html>
