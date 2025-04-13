<?php

session_start();

// remove as variaveis da sessao e depois destrói ela, redirecionando pro index
session_unset(); 
session_destroy();
header('Location: index.php');

exit;
