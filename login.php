<?php

if(isset($_POST['email'])) {
    defined('CONTROL') or die('Acesso inválido.');
    include("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql_code = "SELECT * FROM clientes WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
    $usuario = $sql_exec->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])) {
        if(!isset($_SESSION))        
            session_start();
        $_SESSION['usuario'] = $usuario['id'];
        header("Location: cadastrar_cliente.php");
    } else {
        echo "Falha ao logar! Senha ou email incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <p>
        <br></br>
        <label for="">E-mail</label>
        <input type="text" name="email">
        </p>
        <p>
        <label for="">Senha</label>
        <input type="password" name="senha">
        <br></br>
        </p>
        <button type="submit">LOGAR</button>
        <br></br>
        <a href="/primeiro_projeto/cadastrar_cliente.php">Cadastrar</a>
</body>
</html>