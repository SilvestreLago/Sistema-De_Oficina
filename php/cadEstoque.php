<?php 
#CONECTA AO BD
include_once './conexao.php';

#VARIAVEIS
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$quantidade = htmlspecialchars(strip_tags($_POST['quantidade'])) ?? NULL;

if($nome != NULL){
    #SQL
    $sql = "INSERT INTO SistemaOficina.Estoque(nome, quantidade) VALUES(?, ?)";
    $stmt = $conn->prepare($sql);

    #VERIFICAÇÃO
    if($stmt){
        $stmt->bind_param('ss', $nome, $quantidade);

        #OK
        try{
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header('Location: ../pag/estoque.php?BD=estoque');
            exit;
        }

        #ERRO EXECUCAO
        catch(Exception $e){
            $stmt->close();
            $conn->close();
            header('Location: ../pag/estoque.php?BD=exec');
            exit;
        }

    }

    #ERRO CONEXAO
    else{
        $conn->close();
        header('Location: ../pag/estoque.php?BD=stmt');
        exit;
    }
}else{
    $conn->close();
    header('Location: ../pag/estoque.php?BD=nome');
    exit;
}

?>