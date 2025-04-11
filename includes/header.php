<link rel="stylesheet" href="assets/style.css"> 
<header>
    <div>
        <a href="index.php" id='header-left-text'>Campeões</a>
    </div>

    <div>
        <h1 id='header-mid-text'>League Champions</h1>
    </div>
    
    <div>
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
            <span id='header-mid-text'>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?>!</span>
            <a href="logout.php" id='header-logout-text'>Sair</a>
        <?php else: ?>
            <a href="adminLogin.php" id='header-right-text'>Login</a>
        <?php endif; ?>
    </div>
</header>
