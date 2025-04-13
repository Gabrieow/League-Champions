<?php
session_start();

// carrega os dados de usuários
require_once 'dados/usuarios.php';

// pega os dados do formulário
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// verifica se o usuário existe la no usuarios.php
if (isset($usuarios[$usuario])) {
    // verifica se a senha está correta
    if (password_verify($senha, $usuarios[$usuario])) {
        // login válido = cria sessão e redireciona para dashboard
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard.php');
        exit;
    }
}

// login inválido = retorna com mensagem de erro
$_SESSION['erro_login'] = "Usuário ou senha inválidos.";
header('Location: adminLogin.php');
exit;
