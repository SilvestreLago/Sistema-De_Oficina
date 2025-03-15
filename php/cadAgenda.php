<?php 
#CONECTAR AO BD
include_once "./conexao.php";

#COLETA DE DADOS
$data = htmlspecialchars(strip_tags($_POST['data'])) ?? NULL;
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$orcamento = htmlspecialchars(strip_tags($_POST['orcamento'])) ?? NULL;
$os = htmlspecialchars(strip_tags($_POST['os'])) ?? NULL;

if($nome != NULL && $data != NULL && $orcamento != NULL && $os != NULL){
    #SQL
    $sqlNome = "SELECT idCliente FROM SistemaOficina.Cliente WHERE nome = ?";
    $sqlOrcamento = "SELECT idOrcamento FROM SistemaOficina.Orcamento WHERE nIdentificador = ?";
    $sqlOs = "SELECT idOrdemServico FROM SistemaOficina.ordemServico WHERE nIdentificador = ?";
    $sqlAgenda = "INSERT INTO SistemaOficina.Agenda (idCliente, idOrcamento, idOrdemServico, data, concluido) VALUES (?, ?, ?, ?, FALSE)";

    #PREPARAR SQL
    $stmtNome = $conn->prepare($sqlNome);
    $stmtOrcamento = $conn->prepare($sqlOrcamento);
    $stmtOs = $conn->prepare($sqlOs);
    $stmtAgenda = $conn->prepare($sqlAgenda);

    if($stmtNome and $stmtOrcamento and $stmtOs and $stmtAgenda){
        #COLETA DOS DADOS
        $stmtNome->bind_param("s", $nome);
        $stmtOrcamento->bind_param("i", $orcamento);
        $stmtOs->bind_param("i", $os);

        #NOME
        if($stmtNome->execute()){
            $resultNome = $stmtNome->get_result();
            $resultNome = $resultNome->fetch_assoc();
            if($resultNome == NULL){
                $conn->close();
                $stmtNome->close();
                $stmtOrcamento->close();
                $stmtOs->close();
                header("Location: ../pag/agenda.php?BD=nomeNencontrado");
                exit();
            }
            $idNome = $resultNome['idCliente'];
        }
        else{
            $conn->close();
            $stmtNome->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #ORCAMENTO
        if($stmtOrcamento->execute()){
            $resultOrcamento = $stmtOrcamento->get_result();
            $resultOrcamento = $resultOrcamento->fetch_assoc();
            if($resultOrcamento == NULL){
                $conn->close();
                $stmtNome->close();
                $stmtOrcamento->close();
                $stmtOs->close();
                header("Location: ../pag/agenda.php?BD=orcamentoNencontrado");
                exit();
            }
            $idOrcamento = $resultOrcamento['idOrcamento'];
        }
        else{
            $conn->close();
            $stmtNome->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #ORDEM DE SERVIÇO
        if($stmtOs->execute()){
            $resultOs = $stmtOs->get_result();
            $resultOs = $resultOs->fetch_assoc();
            if($resultOs == NULL){
                $conn->close();
                $stmtNome->close();
                $stmtOrcamento->close();
                $stmtOs->close();
                header("Location: ../pag/agenda.php?BD=osNencontrado");
                exit();
            }
            $idOs = $resultOs['idOrdemServico'];
        }
        else{
            $conn->close();
            $stmtNome->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #INSERINDO OS DADOS
        $stmtAgenda->bind_param("iiis", $idNome, $idOrcamento, $idOs, $data);

        if($stmtAgenda->execute()){
            $stmtNome->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            $stmtAgenda->close();
            $conn->close();
            header("Location: ../pag/agenda.php?BD=addAgenda");
            exit();
        }

        else{
            $conn->close();
            $stmtNome->close();
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