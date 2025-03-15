<?php 
#CONECTAR AO BD
include_once '../php/conexao.php';

date_default_timezone_set('America/Sao_Paulo');

#DATA
$data = new DateTime();
$data = $data->format("Y-m-d");

#SQL
$sqlFisico = 'SELECT sum(valor) as Valor FROM SistemaOficina.Caixa as C WHERE C.tipo = "Fisico" and C.data = ?';
$sqlCartao = 'SELECT sum(valor) as Valor FROM SistemaOficina.Caixa as C WHERE C.tipo = "Cartao" and C.data = ?';
$sqlBanco = 'SELECT sum(valor) as Valor FROM SistemaOficina.Caixa as C WHERE C.tipo = "Banco" and C.data = ?';
$sqlTotal = 'SELECT sum(valor) as Valor FROM SistemaOficina.Caixa as C WHERE C.data = ?';

#PREPARAÇÃO DO STMT
$stmtFisico = $conn->prepare($sqlFisico);
$stmtCartao = $conn->prepare($sqlCartao);
$stmtBanco = $conn->prepare($sqlBanco);
$stmtTotal = $conn->prepare($sqlTotal);

if($stmtFisico and $stmtCartao and $stmtBanco and $stmtTotal){
    $stmtFisico->bind_param('s', $data);
    $stmtCartao->bind_param('s', $data);
    $stmtBanco->bind_param('s', $data);
    $stmtTotal->bind_param('s', $data);

    #FISICO
    $stmtFisico->execute();
    $resultadoFisico = $stmtFisico->get_result();
    $Fisico = $resultadoFisico->fetch_assoc();
    $stmtFisico->close();

    #CARTAO
    $stmtCartao->execute();
    $resultadoCartao = $stmtCartao->get_result();
    $Cartao = $resultadoCartao->fetch_assoc();
    $stmtCartao->close();
    
    #BANCO
    $stmtBanco->execute();
    $resultadoBanco = $stmtBanco->get_result();
    $Banco = $resultadoBanco->fetch_assoc();
    $stmtBanco->close();
    
    #TOTAL
    $stmtTotal->execute();
    $resultadoTotal = $stmtTotal->get_result();
    $Total = $resultadoTotal->fetch_assoc();
    $stmtTotal->close();

    $conn->close();
}

else{
    $Fisico = array("Valor" => 'Erro!');
    $Cartao = array("Valor" => 'Erro!');
    $Banco = array("Valor" => 'Erro!');
    $Total = array("Valor" => 'Erro!');

    $stmtFisico->close();
    $stmtCartao->close();
    $stmtBanco->close();
    $stmtTotal->close();
    $conn->close();
}
?>