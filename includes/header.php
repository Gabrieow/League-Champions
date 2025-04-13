<link rel="stylesheet" href="assets/style.css"> 
<header>
    <div>
        <a href="index.php" id='header-left-text'>Campeões</a>
    </div>

    <div>
        <h1 id='header-mid-text'>League Champions</h1>
    </div>
    
    <div>
        <!-- se já estiver em uma sessão, ele exibe a mensagem "Bem vindo, admin" e se não estiver ele só exibie "login" -->
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
            <span id='header-welcome-text'>Bem-vindo, <a href="dashboard.php" id='admin-text'><?= htmlspecialchars($_SESSION['usuario']) ?></a>!</span>
            <a href="logout.php" id='header-logout-text'>Sair</a>
        <?php else: ?>
            <a href="adminLogin.php" id='header-right-text'>Login</a>
        <?php endif; ?>
    </div>
</header>
