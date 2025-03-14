<?php 
#CONECTA AO BD
include_once './conexao.php';

#VARIAVEIS
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$nIdentificador = htmlspecialchars(strip_tags($_POST['nIdentificador'])) ?? NULL;
$data = htmlspecialchars(strip_tags($_POST['data'])) ?? NULL;
$valor = htmlspecialchars(strip_tags($_POST['valor'])) ?? NULL;
$descricao = htmlspecialchars(strip_tags($_POST['descricao'])) ?? NULL;

if($nIdentificador != NULL){
    #CONFIGURAÇÃO DAS VARIAVEIS
    if($data != NULL){
        $dataFormatada= date('Y-m-d', strtotime(str_replace('/', '-', $data)));
    }else{
        $dataFormatada = NULL;
    }

    #ID CLIENTE
    $sqlID = "SELECT idCliente FROM SistemaOficina.Cliente WHERE nome = ?";
    $stmtID = $conn->prepare($sqlID);

    if($stmtID){
        $stmtID->bind_param('s', $nome);
        if($stmtID->execute()){
            $resultID = $stmtID->get_result();
            $idCliente = $resultID->fetch_assoc()['idCliente'];
            $stmtID->close();
            echo $idCliente;
            if($idCliente == NULL){
                $conn->close();
                header('Location: ../pag/orcamento.php?BD=IDCliente');
                exit;
            }
        }else{
            $stmtID->close();
            $conn->close();
            header('Location: ../pag/orcamento.php?BD=IDCliente');
            exit;
        }
    }

    #SQL
    $sql = "INSERT INTO SistemaOficina.Orcamento (nome, nIdentificador, data, valor, descricao, idCliente) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    #VERIFICACAO
    if($stmt){
        #SQLINJECTION
        $stmt->bind_param('sisisi', $nome, $nIdentificador, $dataFormatada, $valor, $descricao, $idCliente);

        #OK
        try{
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header('Location: ../pag/orcamento.php?BD=orcamento');
            exit;
        }

        #ERRO EXECUCAO
        catch(Exception $e){
            $stmt->close();
            $conn->close();
            header('Location: ../pag/orcamento.php?BD=exec');
            exit;
        }
    }

    #ERRO CONEXAO
    else{
        $conn->close();
        header('Location: ../pag/orcamento.php?BD=stmt');
        exit;
    }
}else{
    $conn->close();
    header('Location: ../pag/orcamento.php?BD=nIdentificador');
    exit;
}
?>