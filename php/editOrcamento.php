<?php 
#CONECTAR AO BD
include 'conexao.php';

$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$nIdentificadorAntigo = htmlspecialchars(strip_tags($_POST['nIdentificadorAntigo'])) ?? NULL;
$nIdentificador = htmlspecialchars(strip_tags($_POST['nIdentificador'])) ?? NULL;
$data = htmlspecialchars(strip_tags($_POST['data'])) ?? NULL;
$valor = htmlspecialchars(strip_tags($_POST['valor'])) ?? NULL;
$descricao = htmlspecialchars(strip_tags($_POST['descricao'])) ?? NULL;

#NOME
if($nome != NULL){
    $sqlNome = "UPDATE Orcamento SET nome = ? WHERE nIdentificador = ?";
    $stmtNome = $conn->prepare($sqlNome);
    if($stmtNome){
        $stmtNome->bind_param('si', $nome, $nIdentificadorAntigo);
        try{
            $stmtNome->execute();
            $stmtNome->close();
        }
        catch(Exception $e){
            $stmtNome->close();
            $conn->close();
            header('Location: ../pag/verOrcamento.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrcamento.php?BD=stmt');
        exit;
    }
}

#DATA
if($data != NULL){
    $sqlData = "UPDATE Orcamento SET data = ? WHERE nIdentificador = ?";
    $stmtData = $conn->prepare($sqlData);
    if($stmtData){
        $stmtData->bind_param('si', $data, $nIdentificadorAntigo);
        try{
            $stmtData->execute();
            $stmtData->close();
        }
        catch(Exception $e){
            $stmtData->close();
            $conn->close();
            header('Location: ../pag/verOrcamento.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrcamento.php?BD=stmt');
        exit;
    }
}

#VALOR
if($valor != NULL){
    $sqlValor = "UPDATE Orcamento SET valor = ? WHERE nIdentificador = ?";
    $stmtValor = $conn->prepare($sqlValor);
    if($stmtValor){
        $stmtValor->bind_param('di', $valor, $nIdentificadorAntigo);
        try{
            $stmtValor->execute();
            $stmtValor->close();
        }
        catch(Exception $e){
            $stmtValor->close();
            $conn->close();
            header('Location: ../pag/verOrcamento.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrcamento.php?BD=stmt');
        exit;
    }
}

#DESCRIÇÃO
if($descricao != NULL){
    $sqlDescricao = "UPDATE Orcamento SET descricao = ? WHERE nIdentificador = ?";
    $stmtDescricao = $conn->prepare($sqlDescricao);
    if($stmtDescricao){
        $stmtDescricao->bind_param('si', $descricao, $nIdentificadorAntigo);
        try{
            $stmtDescricao->execute();
            $stmtDescricao->close();
        }
        catch(Exception $e){
            $stmtDescricao->close();
            $conn->close();
            header('Location: ../pag/verOrcamento.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrcamento.php?BD=stmt');
        exit;
    }
}

#NIDENTIFICADOR
if($nIdentificador != NULL){
    $sqlNIdentificador = "UPDATE Orcamento SET nIdentificador = ? WHERE nIdentificador = ?";
    $stmtNIdentificador = $conn->prepare($sqlNIdentificador);
    if($stmtNIdentificador){
        $stmtNIdentificador->bind_param('ii', $nIdentificador, $nIdentificadorAntigo);
        try{
            $stmtNIdentificador->execute();
            $stmtNIdentificador->close();
        }
        catch(Exception $e){
            $stmtNIdentificador->close();
            $conn->close();
            header('Location: ../pag/verOrcamento.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrcamento.php?BD=stmt');
        exit;
    }
}

$conn->close();
header('Location: ../pag/verOrcamento.php?BD=alterado');
exit;
?>