<?php 
#CONECTAR AO BD
include_once "./conexao.php";

if(isset($_POST['concluir'])){
    $idAgenda = htmlspecialchars(strip_tags($_POST['concluir'])) ?? NULL;
    
    if($idAgenda != NULL){
        #SQL
        $sql = "UPDATE SistemaOficina.Agenda SET concluido = TRUE WHERE idAgenda = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idAgenda);
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header("Location: ../pag/agenda.php?BD=concluido");
            exit();
        }
        else{
            $stmt->close();
            $conn->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }
    }
    else{
        $conn->close();
        header("Location: ../pag/agenda.php?BD=valores");
        exit();
    }
}

if(isset($_POST['excluir'])){
    $idAgenda = htmlspecialchars(strip_tags($_POST['excluir'])) ?? NULL;
    
    if($idAgenda != NULL){
        #SQL
        $sql = "DELETE FROM SistemaOficina.Agenda WHERE idAgenda = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idAgenda);
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header("Location: ../pag/agenda.php?BD=excluido");
            exit();
        }
        else{
            $stmt->close();
            $conn->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }
    }
    else{
        $conn->close();
        header("Location: ../pag/agenda.php?BD=valores");
        exit();
    }
}
    
?>

