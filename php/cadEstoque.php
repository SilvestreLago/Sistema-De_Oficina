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
        $stmt->bind_param('si', $nome, $quantidade);

        #OK
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header('Location: ../pag/estoque.php?BD=estoque');
        }

        #ERRO EXECUCAO
        else{
            $stmt->close();
            $conn->close();
            header('Location: ../pag/estoque.php?BD=exec');
        }

    }

    #ERRO CONEXAO
    else{
        $conn->close();
        header('Location: ../pag/estoque.php?BD=stmt');
    }
}else{
    $conn->close();
    header('Location: ../pag/estoque.php?BD=nome');
    exit;
}

?>