<?php
session_start();

$erro = '';

if (isset($_SESSION['usuario'])) {
    header("Location: main.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "db_tiodupetservice"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
     
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['funcao'] = $row['funcao'];
            header("Location: main.php");
            exit();
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        /* Estilo geral da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container do login */
        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            border: 2px solid #FFD700;
        }

        /* Título do login */
        .login-container h2 {
            color: #FFD700;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Estilos dos rótulos (labels) */
        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
        }

        /* Estilos dos inputs */
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Estilo do botão */
        .login-container button {
            background-color: #FFD700;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }

        /* Efeito hover no botão */
        .login-container button:hover {
            background-color: #FFC200;
        }

        /* Efeito quando o botão é pressionado */
        .login-container button:active {
            background-color: #E6B800;
            transform: scale(0.98);
        }

        /* Mensagens de erro */
        .error-message {
            color: red;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: left;
            background-color: #fdd;
            padding: 10px;
            border-radius: 5px;
        }

        /* Estilo para a imagem do logo */
        .login-container img {
            max-width: 100%; /* Faz a imagem se ajustar ao tamanho do contêiner */
            height: auto; /* Mantém a proporção da imagem */
            margin-bottom: 20px; /* Espaçamento abaixo do logo */
        }

        /* Estilos responsivos */
        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="../assets/images/LogoTioDu.png" alt="Logo Tio Du">
        <h2>Login</h2>

        <!-- Exibe mensagem de erro, se houver -->
        <?php if ($erro): ?>
            <div class="error-message"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required><br>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>
            
            <button type="submit">Entrar</button>

            
        </form>
        <button class="back-button" onclick="window.location.href='../index.php';">Voltar</button>
    </div>
    </div>
</body>
</html>
