<?php

session_start();

// metodo post pra receber um novoCampeao e dps jogando ele no array 'campeoes'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoCampeao = [
        'nome' => $_POST['nome'],
        'imagem' => $_POST['imagem'],
        'subtitulo' => $_POST['subtitulo'],
        'descricao' => $_POST['descricao'],
        'classe' => array_map('trim', explode(',', $_POST['classe'])),
    ];

    // adiciona o novoCampeao na sessão
    $_SESSION['campeoes'][] = $novoCampeao;

    // redireciona pro index
    header('Location: index.php');
    exit;
}

?>