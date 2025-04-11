<?php
session_start();
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Encerra a sessão

// Redireciona de volta para a página inicial
header('Location: index.php');
exit;
