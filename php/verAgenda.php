<?php 
#CONECTAR AO BD
include_once "../php/conexao.php";

$sql = "SELECT * FROM SistemaOficina.Agenda WHERE concluido = FALSE ORDER BY data ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$agendas = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
foreach($agendas as $key => $value){
    $idAgenda = $value['idAgenda'];
    $data = date('d/m/Y', strtotime($value['data']));
    $idCliente = $value['idCliente'];
    $idOrcamento = $value['idOrcamento'];
    $idOrdemServico = $value['idOrdemServico'];    

    #SQL VALOR
    $sqlCliente = "SELECT nome FROM SistemaOficina.Cliente WHERE idCliente = ?";
    $sqlOrcamento = "SELECT nIdentificador FROM SistemaOficina.Orcamento WHERE idOrcamento = ?";
    $sqlOs = "SELECT nIdentificador FROM SistemaOficina.ordemServico WHERE idOrdemServico = ?";

    #PREPARAR SQL
    $stmtCliente = $conn->prepare($sqlCliente);
    $stmtOrcamento = $conn->prepare($sqlOrcamento);
    $stmtOs = $conn->prepare($sqlOs);

    if($stmtCliente and $stmtOrcamento and $stmtOs){
        #COLETA DOS DADOS
        $stmtCliente->bind_param("i", $idCliente);
        $stmtOrcamento->bind_param("i", $idOrcamento);
        $stmtOs->bind_param("i", $idOrdemServico);

        #CLIENTE
        if($stmtCliente->execute()){
            $resultCliente = $stmtCliente->get_result();
            $resultCliente = $resultCliente->fetch_assoc();
            $cliente = $resultCliente['nome'];
        }
        else{
            $conn->close();
            $stmtCliente->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #ORCAMENTO
        if($stmtOrcamento->execute()){
            $resultOrcamento = $stmtOrcamento->get_result();
            $resultOrcamento = $resultOrcamento->fetch_assoc();
            $orcamento = $resultOrcamento['nIdentificador'];
        }
        else{
            $conn->close();
            $stmtCliente->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }

        #ORDEM DE SERVIÇO
        if($stmtOs->execute()){
            $resultOs = $stmtOs->get_result();
            $resultOs = $resultOs->fetch_assoc();
            $os = $resultOs['nIdentificador'];
        }
        else{
            $conn->close();
            $stmtCliente->close();
            $stmtOrcamento->close();
            $stmtOs->close();
            header("Location: ../pag/agenda.php?BD=exec");
            exit();
        }
    }
    else{
        $conn->close();
        $stmtCliente->close();
        $stmtOrcamento->close();
        $stmtOs->close();
        header("Location: ../pag/agenda.php?BD=stmt");
        exit();
    }

    echo "<tr>";
    echo "<th scope='row'>".($key+1)."</th>";
    echo "<td>".$cliente."</td>";
    echo "<td>".$data."</td>";
    echo "<td>".$orcamento."</td>";
    echo "<td>".$os."</td>";
    echo "<td><button class='btn btn-danger' type='submit' name='excluir' value='$idAgenda'><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'><path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/></svg></button></td>";
    echo "<td><button class='btn btn-primary' type='submit' name='concluir' value='$idAgenda'><svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-check-square-fill' viewBox='0 0 16 16'><path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z'/></svg></button></td>";
    echo "</tr>";
}
exit();

?>