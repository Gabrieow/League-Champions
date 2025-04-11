<?php
session_start();
?>

<header style="padding: 20px; background: #f2f2f2; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="index.php" style="text-decoration: none; font-weight: bold; font-size: 20px;">🏆 Campeões</a>
    </div>
    
    <div>
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
            <span>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?>!</span>
            <a href="logout.php" style="margin-left: 15px; color: red;">Sair</a>
        <?php else: ?>
            <a href="adminLogin.php" style="color: blue;">Login</a>
        <?php endif; ?>
    </div>
</header>
