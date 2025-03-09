<?php 
    #DESTROI POSSÍVEIS SESSÕES
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['acesso']);
    unset($_SESSION['usuario']);
    session_destroy();

    #REDIRECIONAMENTO
    header('Location: ../index.php');
    exit;
?>