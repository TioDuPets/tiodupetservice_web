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
    <style>
.logo {
    font-size: 20px;
    letter-spacing: 4px;
    padding-left: 15px;
    align-items: normal;
}

.logo img {
    width:13vh;
    height: auto;
    display: block;
    border-radius: 50pt;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

nav{
    font-size: 20px;
    width: 100%;
    display: flex;
    justify-content:space-around;
    align-items: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background-color: #f0f001;
    height: 12vh;
    border-radius: 10pt;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.footer {
    letter-spacing: 4px;
    font-size: 20px;
    border-radius: 10pt;
    background-color: #f0f001;
    padding: 10px;
}

.MFF{
    border-radius: 10pt;
    background-color: #f0f001;
    display: flex;
    justify-content: center;
    align-items: center;   
}


    </style>
<title>Tio Du Pets - Login</title>
<nav>
    <a class="logo" href="#"><img src="../assets/images/LogoTioDu.svg" alt="Logo Tio Du Pets"></a>
</nav>
</head>

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


</head>


<div class="MFF">
<footer class="footer">
    <div><p>&copy; M.F.F Consultoria. 2024 | Orgulhosamente criado com AMOR.</p></div>
</div>


</html>
