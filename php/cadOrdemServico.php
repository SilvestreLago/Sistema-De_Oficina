<?php 
#CONECTA AO BD
include_once './conexao.php';

#VARIAVEIS
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$nIdentificador = htmlspecialchars(strip_tags($_POST['nIdentificador'])) ?? NULL;
$dataEntrada = htmlspecialchars(strip_tags($_POST['dataEntrada'])) ?? NULL;
$dataSaida = htmlspecialchars(strip_tags($_POST['dataSaida'])) ?? NULL;
$observacao = htmlspecialchars(strip_tags($_POST['observacao'])) ?? NULL;

if($nIdentificador != NULL){
    # MOVENDO A FOTO ANTES PARA O DIRETÓRIO DE FOTOS
    if(!empty($_FILES['fotoAntes']) && $_FILES['fotoAntes']['error'] === UPLOAD_ERR_OK){
        $destinoAntes = "../fotosAntes/$nIdentificador.png";
        if(move_uploaded_file($_FILES['fotoAntes']["tmp_name"], $destinoAntes)) {
            $fotoAntes = $destinoAntes;
        }else{
            $conn->close();
            header('Location: ../pag/ordemServico.php?BD=fotoAntes');
            exit;
        }
    } else{
        $fotoAntes = NULL; 
    }

    # MOVENDO A FOTO DEPOIS PARA O DIRETÓRIO DE FOTOS
    if(!empty($_FILES['fotoDepois']) && $_FILES['fotoDepois']['error'] === UPLOAD_ERR_OK){
        $destinoDepois = "../fotosDepois/$nIdentificador.png";
        if(move_uploaded_file($_FILES['fotoDepois']["tmp_name"], $destinoDepois)) {
            $fotoDepois = $destinoDepois;
        } else{
            $conn->close();
            header('Location: ../pag/ordemServico.php?BD=fotoDepois');
            exit;
        }
    } else{
        $fotoDepois = NULL;
    }

    #CONFIGURAÇÃO DAS VARIAVEIS
    if($dataEntrada != NULL){
        $dataEntradaFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $dataEntrada)));
    }else{
        $dataEntradaFormatada = NULL;
    }

    if($dataSaida != NULL){
        $dataSaidaFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $dataSaida)));
    }else{
        $dataSaidaFormatada = NULL;
    }

    #SQL
    $sql = "INSERT INTO SistemaOficina.ordemServico (nome, nIdentificador, dataEntrada, dataSaida, observacao, fotoAntes, fotoDepois) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    #VERIFICACAO
    if($stmt){
        #SQLINJECTION
        $stmt->bind_param('sisssss', $nome, $nIdentificador, $dataEntradaFormatada, $dataSaidaFormatada, $observacao, $fotoAntes, $fotoDepois);

        #OK
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header('Location: ../pag/ordemServico.php?BD=ordemServico');
            exit;
        }

        #ERRO EXECUCAO
        else{
            $stmt->close();
            $conn->close();
            header('Location: ../pag/ordemServico.php?BD=exec');
            exit;
        }
    }

    #ERRO CONEXAO
    else{
        $conn->close();
        header('Location: ../pag/ordemServico.php?BD=stmt');
        exit;
    }
}else{
    $conn->close();
    header('Location: ../pag/ordemServico.php?BD=nIdentificador');
    exit;
}
?>