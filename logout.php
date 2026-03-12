<?php
// Inicia a sessão para ter acesso aos dados que serão destruídos
session_start();

// Limpa todas as variáveis de sessão (limpa a memória)
$_SESSION = array();

// Destrói a sessão no servidor
session_destroy();

// Redireciona o usuário para a página de login após sair
header("Location: index.php");
exit();
?>
