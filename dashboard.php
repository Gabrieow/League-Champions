<?php
session_start();

// verifica se o usuario está logado, se não estiver, manda pro login
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: adminLogin.php');
    exit;
}

?>

<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="assets/style.css"> 

<!-- formulário pra cadastrar campeão, chamando o script "cadastrarCampeao.php" -->
<div class="wrapper">
    <div class="login-container">
        <div class="login-box cadastro-box">
            <h2>Cadastrar Campeão</h2>
            <form action="cadastrarCampeao.php" method="POST">
                <input type="text" name="nome" placeholder="Nome do campeão" required>
                <input type="text" name="subtitulo" placeholder="Subtítulo" required>
                <textarea name="descricao" placeholder="Descrição" required></textarea>
                <input type="text" name="imagem" placeholder="URL da imagem" required>
                <input type="text" name="classe" placeholder="Classe(s), separadas por vírgula" required>
                <button type="submit">Salvar Campeão</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

