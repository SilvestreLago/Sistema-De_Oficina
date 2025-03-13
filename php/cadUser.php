<?php 
#CONECTAR AO BD
include_once "./conexao.php";

$nome = htmlspecialchars(strip_tags($_POST['usuario'])) ?? NULL;
$senha = htmlspecialchars(strip_tags($_POST['senha'])) ?? NULL;
$acesso = htmlspecialchars(strip_tags($_POST['acesso'])) ?? 0;

if($nome != NULL and $senha != NULL){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO SistemaOficina.Usuarios (nome, senha, acesso) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if($stmt){
        $stmt->bind_param("ssi", $nome, $senha, $acesso);
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header("Location: ../pag/edit.php?BD=addUser");
        }

        else{
            $stmt->close();
            $conn->close();
            header("Location: ../pag/edit.php?BD=exec");
        }
    }

    else{
        $conn->close();
        header("Location: ../pag/edit.php?BD=stmt");
    }
}
else{
    $conn->close();
    header("Location: ../pag/edit.php?BD=valores");
}
?>