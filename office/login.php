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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css"> <!-- Seu arquivo de estilo -->
    <title>Tio Du Pets - Login</title>
</head>

<body>
    <div class="container-centered">
        <div class="form-container">
            <h1 class="text-center">Login</h1>

            <?php if (isset($error)) : ?>
                <div class="form-content">
                    <p style="color: red;"><?php echo $error; ?></p>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-content">
                    <label for="username"><b>Usuário</b></label>
                    <input class="form-input" type="text" id="username" name="username" required>
                </div>

                <div class="form-content">
                    <label for="password"><b>Senha</b></label>
                    <input class="form-input" type="password" id="password" name="password" required>
                </div>

                <div class="form-content">
                    <button type="submit" class="botao"><i class="fa fa-sign-in"></i> Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
