<?php 
#CONECTAR AO BD
include_once "./conexao.php";

session_start();
$nome = $_SESSION['usuario'];
$usuario = htmlspecialchars(strip_tags($_POST['usuario'])) ?? NULL;
$senha = htmlspecialchars(strip_tags($_POST['senha'])) ?? NULL;

if($senha != NULL){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sqlSenha = "UPDATE Usuarios SET senha = ? WHERE nome = ?";
    $stmtSenha = $conn->prepare($sqlSenha);
    if($stmtSenha){
        $stmtSenha->bind_param('ss', $senha, $nome);
        if($stmtSenha->execute()){
            $stmtSenha->close();
        }
        else{
            $stmt->close();
            $conn->close();
            header('Location: ../pag/edit.php?BD=edicaoSenha');
            exit;
        }
    }
}

if($usuario != NULL){
    $sqlUser = "UPDATE Usuarios SET nome = ? WHERE nome = ?";
    $stmtUser = $conn->prepare($sqlUser);
    if($stmtUser){
        $stmtUser->bind_param('ss', $usuario, $nome);
        if($stmtUser->execute()){
            $stmtUser->close();
            $conn->close();
        }
        else{
            $stmt->close();
            header('Location: ../pag/edit.php?BD=edicaoUser');
            exit;
        }
    }
}
header('Location: ./sair.php');
exit;
?>