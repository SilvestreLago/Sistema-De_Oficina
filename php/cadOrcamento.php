<?php 
#CONECTA AO BD
include_once './conexao.php';

#VARIAVEIS
$nome = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$nIdentificador = htmlspecialchars(strip_tags($_POST['nIdentificador'])) ?? NULL;
$data = htmlspecialchars(strip_tags($_POST['data'])) ?? 'NULL';
$valor = htmlspecialchars(strip_tags($_POST['valor'])) ?? NULL;
$descricao = htmlspecialchars(strip_tags($_POST['descricao'])) ?? NULL;

if($nIdentificador != NULL){
    #CONFIGURAÇÃO DAS VARIAVEIS
    if($data != NULL){
        $dataFormatada= date('Y-m-d', strtotime(str_replace('/', '-', $data)));
    }else{
        $$dataFormatada = NULL;
    }

    #SQL
    $sql = "INSERT INTO SistemaOficina.Orcamento (nome, nIdentificador, data, valor, descricao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    #VERIFICACAO
    if($stmt){
        #SQLINJECTION
        $stmt->bind_param('sisis', $nome, $nIdentificador, $dataFormatada, $valor, $descricao);

        #OK
        if($stmt->execute()){
            $stmt->close();
            $conn->close();
            header('Location: ../pag/orcamento.php?BD=orcamento');
            exit;
        }

        #ERRO EXECUCAO
        else{
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