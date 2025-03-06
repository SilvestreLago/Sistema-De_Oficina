<?php 
#CONECTA AO BD
include_once './conexao.php';

#VARIAVEIS
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$endereco = htmlspecialchars(strip_tags($_POST['endereco'])) ?? NULL;
$tel = htmlspecialchars(strip_tags($_POST['tel'])) ?? NULL;
$cpf = htmlspecialchars(strip_tags($_POST['cpf'])) ?? NULL;


if($nome != NULL){
    #SQL
    $sql = "INSERT INTO SistemaOficina.Cliente (nome, endereco, tel, cpf) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    #VERIFICACAO
    if($stmt){
        #SQLINJECTION
        $stmt->bind_param('ssss', $nome, $endereco, $tel, $cpf);

        #OK
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header('Location: ../pag/cliente.php?BD=cliente');
        }

        #ERRO EXECUCAO
        else{
            $stmt->close();
            $conn->close();
            header('Location: ../pag/cliente.php?BD=exec');
        }
    }

    #ERRO CONEXAO
    else{
        $conn->close();
        header('Location: ../pag/cliente.php?BD=stmt');
    }
}else{
    $conn->close();
    header('Location: ../pag/cliente.php?BD=nome');
    exit;
}
?>