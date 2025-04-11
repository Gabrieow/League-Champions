<?php include 'includes/header.php'; ?>
<!-- conteúdo da página -->

<?php
session_start();

// Se já estiver logado, redireciona direto para o dashboard
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login - Campeões</title>
        <link rel="stylesheet" href="assets/style.css"> <!-- Se quiser usar CSS externo -->
        <style>
            body {
                margin: 0;
                padding: 0;
                background: #fff;
                font-family: Arial, sans-serif;
        }
        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        .login-box button {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-box button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    
    <div class="login-container">
        <form class="login-box" action="login.php" method="post">
            <h2>Login</h2>
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    
    <?php
    if (isset($_SESSION['erro_login'])) {
        echo "<p style='color: red'>" . $_SESSION['erro_login'] . "</p>";
        unset($_SESSION['erro_login']);
    }
    ?>


</div>

</body>
</html>

<?php include 'includes/footer.php'; ?>