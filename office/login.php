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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tio Du Pets - Login</title>
</head>

<body>
    <div class="w3-padding w3-text-grey w3-half w3-display-middle w3-center">
        <h1 class="w3-center w3-teal w3-round-large w3-margin">Login</h1>

        <?php if (isset($error)) : ?>
            <div class="w3-panel w3-red">
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="w3-container w3-card-4 w3-light-grey w3-text-teal w3-margin">
            <div class="w3-section">
                <label for="username"><b>Usuário</b></label>
                <input class="w3-input w3-border w3-round-large" type="text" id="username" name="username" required>
            </div>
            <div class="w3-section">
                <label for="password"><b>Senha</b></label>
                <input class="w3-input w3-border w3-round-large" type="password" id="password" name="password" required>
            </div>
            <div class="w3-section">
                <button type="submit" class="w3-button w3-block w3-teal w3-round-large">Entrar</button>
            </div>

        </form>
    </div>
</body>

</html>
