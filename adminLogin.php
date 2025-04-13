<?php include 'includes/header.php'; ?>

<?php

// se ja estiver logado, manda pro dashboard
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: dashboard.php');
    exit;
}
?>

<link rel="stylesheet" href="assets/style.css"> 

<div class="wrapper">
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
</div>

<?php include 'includes/footer.php'; ?>