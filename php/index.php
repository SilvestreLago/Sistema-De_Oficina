<?php 
#VERIFICA SE O USUÁRIO ESTÁ LOGADO VIA SESSÃO
session_start();
if(!$_SESSION['login'] and !$_SESSION['acesso'] and !$_SESSION['usuario']){
    unset($_SESSION['login']);
    unset($_SESSION['acesso']);
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location: ../index.php');
    exit();
}
?>