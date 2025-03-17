<?php 
#CONECTAR AO BD
include_once "./conexao.php";

#COLETA DE DADOS
$data = htmlspecialchars(strip_tags($_POST['data'])) ?? NULL;
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$orcamento = htmlspecialchars(strip_tags($_POST['orcamento'])) ?? NULL;
$os = htmlspecialchars(strip_tags($_POST['os'])) ?? NULL;

if($nome != NULL && $data != NULL){
    #SQL
    $sqlOrcamento = "SELECT idOrcamento FROM SistemaOficina.Orcamento WHERE nIdentificador = ?";
    $sqlOs = "SELECT idOrdemServico FROM SistemaOficina.ordemServico WHERE nIdentificador = ?";
    $sqlAgenda = "INSERT INTO SistemaOficina.Agenda (nomeCliente, idOrcamento, idOrdemServico, data, concluido) VALUES (?, ?, ?, ?, FALSE)";

    #PREPARAR SQL
    $stmtOrcamento = $conn->prepare($sqlOrcamento);
    $stmtOs = $conn->prepare($sqlOs);
    $stmtAgenda = $conn->prepare($sqlAgenda);

    if($stmtOrcamento and $stmtOs and $stmtAgenda){
        #COLETA DOS DADOS
        $stmtOrcamento->bind_param("i", $orcamento);
        $stmtOs->bind_param("i", $os);

        #ORCAMENTO
        if($stmtOrcamento->execute()){
            $resultOrcamento = $stmtOrcamento->get_result();
            $resultOrcamento = $resultOrcamento->fetch_assoc();
            $idOrcamento = $resultOrcamento['idOrcamento'];
        }
        else{
            $conn->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #ORDEM DE SERVIÇO
        if($stmtOs->execute()){
            $resultOs = $stmtOs->get_result();
            $resultOs = $resultOs->fetch_assoc();
            $idOs = $resultOs['idOrdemServico'];
        }
        else{
            $conn->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #INSERINDO OS DADOS
        $stmtAgenda->bind_param("siis", $nome, $idOrcamento, $idOs, $data);

        if($stmtAgenda->execute()){
            $stmtOrcamento->close();
            $stmtOs->close();
            $stmtAgenda->close();
            $conn->close();
            header("Location: ../pag/agenda.php?BD=addAgenda");
            exit();
        }

        else{
            $conn->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            $stmtAgenda->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }
    }

    else{
        $conn->close();
        header("Location: ../pag/agenda.php?BD=stmt");
        exit();
    }
}
else{
    $conn->close();
    header("Location: ../pag/agenda.php?BD=valores");
    exit();
}
?>