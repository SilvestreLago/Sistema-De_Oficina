<?php 
#CONECTA AO BD
include_once './conexao.php';

$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$nIdentificadorAntigo = htmlspecialchars(strip_tags($_POST['nIdentificadorAntigo'])) ?? NULL;
$nIdentificador = htmlspecialchars(strip_tags($_POST['nIdentificador'])) ?? NULL;
$dataEntrada = htmlspecialchars(strip_tags($_POST['dataEntrada'])) ?? NULL;
$dataSaida = htmlspecialchars(strip_tags($_POST['dataSaida'])) ?? NULL;
$observacao = htmlspecialchars(strip_tags($_POST['observacao'])) ?? NULL;
$fotoAntes = $_FILES['fotoAntes'] ?? NULL;
$fotoDepois = $_FILES['fotoDepois'] ?? NULL;

if($nIdentificador != NULL){
    $nIdentificadorFoto = $nIdentificador;
}else{
    $nIdentificadorFoto = $nIdentificadorAntigo;
}

#NOME
if($nome != NULL){
    $sqlIdCliete = "SELECT * FROM Cliente WHERE nome = ?";
    $stmtIdCliente = $conn->prepare($sqlIdCliete);

    if($stmtIdCliente){
        $stmtIdCliente->bind_param('s', $nome);
        if($stmtIdCliente->execute()){
            $resultado = $stmtIdCliente->get_result();
            $valores = $resultado->fetch_assoc();
            $idCliente = $valores['idCliente'];
            $stmtIdCliente->close();
        }
        else{
            $stmtIdCliente->close();
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=stmt');
        exit;
    }


    $sqlNome = "UPDATE ordemServico SET nome = ?, idCliente = ? WHERE nIdentificador = ?";
    $stmtNome = $conn->prepare($sqlNome);
    if($stmtNome){
        $stmtNome->bind_param('sii', $nome, $idCliente, $nIdentificadorAntigo);
        try{
            $stmtNome->execute();
            $stmtNome->close();
        }
        catch(Exception $e){
            $stmtNome->close();
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=stmt');
        exit;
    }
}

#DATA ENTRADA
if($dataEntrada != NULL){
    $sqlDataEntrada = "UPDATE ordemServico SET dataEntrada = ? WHERE nIdentificador = ?";
    $stmtDataEntrada = $conn->prepare($sqlDataEntrada);
    if($stmtDataEntrada){
        $stmtDataEntrada->bind_param('si', $dataEntrada, $nIdentificadorAntigo);
        try{
            $stmtDataEntrada->execute();
            $stmtDataEntrada->close();
        }
        catch(Exception $e){
            $stmtDataEntrada->close();
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=stmt');
        exit;
    }
}

#DATA SAIDA
if($dataSaida != NULL){
    $sqlDataSaida = "UPDATE ordemServico SET dataSaida = ? WHERE nIdentificador = ?";
    $stmtDataSaida = $conn->prepare($sqlDataSaida);
    if($stmtDataSaida){
        $stmtDataSaida->bind_param('si', $dataSaida, $nIdentificadorAntigo);
        try{
            $stmtDataSaida->execute();
            $stmtDataSaida->close();
        }
        catch(Exception $e){
            $stmtDataSaida->close();
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=stmt');
        exit;
    }
}

#OBSERVAÇÃO
if($observacao != NULL){
    $sqlObservacao = "UPDATE ordemServico SET observacao = ? WHERE nIdentificador = ?";
    $stmtObservacao = $conn->prepare($sqlObservacao);
    if($stmtObservacao){
        $stmtObservacao->bind_param('si', $observacao, $nIdentificadorAntigo);
        try{
            $stmtObservacao->execute();
            $stmtObservacao->close();
        }
        catch(Exception $e){
            $stmtObservacao->close();
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=stmt');
        exit;
    }
}

#FOTO ANTES
if(!empty($_FILES['fotoAntes']) && $_FILES['fotoAntes']['error'] === UPLOAD_ERR_OK){
    $fotoAntesNome = $fotoAntes['name'];
    $fotoAntesErro = $fotoAntes['error'];
    $fotoAntesTmp = $fotoAntes['tmp_name'];

    if($fotoAntesErro == 0){
        $fotoAntesDestino = '../fotosAntes/'.$nIdentificadorFoto.'.png';
        move_uploaded_file($fotoAntesTmp, $fotoAntesDestino);

        $sqlFotoAntes = "UPDATE ordemServico SET fotoAntes = ? WHERE nIdentificador = ?";
        $stmtFotoAntes = $conn->prepare($sqlFotoAntes);
        if($stmtFotoAntes){
            $stmtFotoAntes->bind_param('si', $fotoAntesDestino, $nIdentificadorAntigo);
            try{
                $stmtFotoAntes->execute();
                $stmtFotoAntes->close();
            }
            catch(Exception $e){
                $stmtFotoAntes->close();
                $conn->close();
                header('Location: ../pag/verOrdemServico.php?BD=exec');
                exit;
            }
        }
        else{
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=stmt');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=erro');
        exit;
    }
}

#FOTO DEPOIS
if(!empty($_FILES['fotoDepois']) && $_FILES['fotoDepois']['error'] === UPLOAD_ERR_OK){
    $fotoDepoisNome = $fotoDepois['name'];
    $fotoDepoisErro = $fotoDepois['error'];
    $fotoDepoisTmp = $fotoDepois['tmp_name'];

    if($fotoDepoisErro == 0){
        $fotoDepoisDestino = '../fotosDepois/'.$nIdentificadorFoto.'.png';
        move_uploaded_file($fotoDepoisTmp, $fotoDepoisDestino);

        $sqlFotoDepois = "UPDATE ordemServico SET fotoDepois = ? WHERE nIdentificador = ?";
        $stmtFotoDepois = $conn->prepare($sqlFotoDepois);
        if($stmtFotoDepois){
            $stmtFotoDepois->bind_param('si', $fotoDepoisDestino, $nIdentificadorAntigo);
            try{
                $stmtFotoDepois->execute();
                $stmtFotoDepois->close();
            }
            catch(Exception $e){
                $stmtFotoDepois->close();
                $conn->close();
                header('Location: ../pag/verOrdemServico.php?BD=exec');
                exit;
            }
        }
        else{
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=stmt');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=erro');
        exit;
    }
}

#N° IDENTIFICADOR
if($nIdentificador != NULL){
    $sqlNIdentificador = "UPDATE ordemServico SET nIdentificador = ? WHERE nIdentificador = ?";
    $stmtNIdentificador = $conn->prepare($sqlNIdentificador);
    if($stmtNIdentificador){
        $stmtNIdentificador->bind_param('ii', $nIdentificador, $nIdentificadorAntigo);
        try{
            $stmtNIdentificador->execute();
            $stmtNIdentificador->close();
        }
        catch(Exception $e){
            $stmtNIdentificador->close();
            $conn->close();
            header('Location: ../pag/verOrdemServico.php?BD=exec');
            exit;
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrdemServico.php?BD=stmt');
        exit;
    }
}

$conn->close();
header('Location: ../pag/verOrdemServico.php?BD=alterado');
exit;
?>