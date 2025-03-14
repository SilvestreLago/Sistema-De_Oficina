<?php 
#CONECTAR AO BD
include_once './conexao.php';

$nomeAntigo = htmlspecialchars(strip_tags($_POST['nomeAntigo'])) ?? NULL;
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$endereco = htmlspecialchars(strip_tags($_POST['endereco'])) ?? NULL;
$telefone = htmlspecialchars(strip_tags($_POST['tel'])) ?? NULL;
$cpf = htmlspecialchars(strip_tags($_POST['cpf'])) ?? NULL;

#CPF
if($cpf != NULL){
    $sqlCPF = "UPDATE Cliente SET cpf = ? WHERE nome = ?";
    $stmtCPF = $conn->prepare($sqlCPF);
    if($stmtCPF){
        $stmtCPF->bind_param('ss', $cpf, $nomeAntigo);
        if($stmtCPF->execute()){
            $stmtCPF->close();
        }
        else{
            $stmtCPF->close();
            $conn->close();
            header('Location: ../pag/verCliente.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verCliente.php?BD=stmt');
        exit;
    }
}

#TELEFONE
if($telefone != NULL){
    $sqlTelefone = "UPDATE Cliente SET tel = ? WHERE nome = ?";
    $stmtTelefone = $conn->prepare($sqlTelefone);
    if($stmtTelefone){
        $stmtTelefone->bind_param('ss', $telefone, $nomeAntigo);
        if($stmtTelefone->execute()){
            $stmtTelefone->close();
        }
        else{
            $stmtTelefone->close();
            $conn->close();
            header('Location: ../pag/verCliente.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verCliente.php?BD=stmt');
        exit;
    }
}

#ENDEREÇO
if($endereco != NULL){
    $sqlEndereco = "UPDATE Cliente SET endereco = ? WHERE nome = ?";
    $stmtEndereco = $conn->prepare($sqlEndereco);
    if($stmtEndereco){
        $stmtEndereco->bind_param('ss', $endereco, $nomeAntigo);
        if($stmtEndereco->execute()){
            $stmtEndereco->close();
        }
        else{
            $stmtEndereco->close();
            $conn->close();
            header('Location: ../pag/verCliente.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verCliente.php?BD=stmt');
        exit;
    }
}

#NOME
if($nome != NULL){
    $sqlNome = "UPDATE Cliente SET nome = ? WHERE nome = ?";
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
            header('Location: ../pag/verCliente.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verCliente.php?BD=stmt');
        exit;
    }
}


header('Location: ../pag/verCliente.php?BD=alterado');
exit;
?>