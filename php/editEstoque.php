<?php 
#CONECTAR AO BD
include_once './conexao.php';

$nomeAntigo = htmlspecialchars(strip_tags($_POST['nomeAntigo'])) ?? NULL;
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$quantidade = htmlspecialchars(strip_tags($_POST['quantidade'])) ?? NULL;

#QUANTIDADE
if($quantidade != NULL){
    $sqlQuantidade = "UPDATE Estoque SET quantidade = ? WHERE nome = ?";
    $stmtQuantidade = $conn->prepare($sqlQuantidade);
    if($stmtQuantidade){
        $stmtQuantidade->bind_param('ss', $quantidade, $nomeAntigo);
        if($stmtQuantidade->execute()){
            $stmtQuantidade->close();
        }
        else{
            $stmtQuantidade->close();
            $conn->close();
            header('Location: ../pag/verEstoque.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verEstoque.php?BD=stmt');
        exit;
    }
}

#NOME
if($nome != NULL){
    $sqlNome = "UPDATE Estoque SET nome = ? WHERE nome = ?";
    $stmtNome = $conn->prepare($sqlNome);
    if($stmtNome){
        $stmtNome->bind_param('ss', $nome, $nomeAntigo);
        try{
            $stmtNome->execute();
            $stmtNome->close();
        }
        catch(Exception $e){
            $stmtNome->close();
            $conn->close();
            header('Location: ../pag/verEstoque.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verEstoque.php?BD=stmt');
        exit;
    }
}

header('Location: ../pag/verEstoque.php?BD=alterado');
exit;
?>