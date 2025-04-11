<?php
session_start();

// Carrega os usuários autorizados
require_once 'dados/usuarios.php';

// Pega os dados do formulário
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se o usuário existe no array
if (isset($usuarios[$usuario])) {
    // Verifica se a senha está correta
    if (password_verify($senha, $usuarios[$usuario])) {
        // Login válido → cria sessão e redireciona para dashboard
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard.php');
        exit;
    }
}

// Se não passou, login inválido → retorna com mensagem de erro
$_SESSION['erro_login'] = "Usuário ou senha inválidos.";
header('Location: adminLogin.php');
exit;
