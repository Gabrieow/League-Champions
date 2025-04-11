<?php include 'includes/header.php'; ?>
<!-- conteúdo da página -->

<?php

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
        <link rel="stylesheet" href="assets/style.css"> 
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