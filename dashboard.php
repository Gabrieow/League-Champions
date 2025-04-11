<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    // Se não estiver logado, redireciona para o login
    header('Location: adminLogin.php');
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<!-- conteúdo da página -->
<?php include 'includes/footer.php'; ?>