<?php 
#CONECTAR AO BD
include_once './conexao.php';

#COLETA DOS DADOS
session_start();
$user = $_SESSION['usuario'];
$valor = htmlspecialchars(strip_tags($_POST['valor'])) ?? NULL;
$tipo = htmlspecialchars(strip_tags($_POST['tipo'])) ?? NULL;
$data = new DateTime();
$data = $data->format("Y-m-d");


if($user and $valor and $tipo and $data){
    #COLETAR O ID DO USUARIO
    $sql = 'SELECT idUsuario FROM SistemaOficina.Usuarios as U WHERE U.Nome = ?';
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('s', $user);

        if($stmt->execute()){
            #EXECUÇÃO OK USUARIO
            $resultado = $stmt->get_result();
            $idUsuario = $resultado->fetch_assoc();
            
            #INSERIR NO BD
            $sql = 'INSERT INTO SistemaOficina.Caixa(valor, tipo, data, idUsuario) VALUES(?, ?, ?, ?)';
            $stmt = $conn->prepare($sql);

            if($stmt){
                $stmt->bind_param('dssi', $valor, $tipo, $data, $idUsuario);

                if($stmt->execute()){
                    #EXECUÇÃO OK INSERT
                    $stmt->close();
                    $conn->close();
                    header('Location: ../pag/caixa.php?BD=caixa');
                    exit;
                }

                else{
                    #ERRO EXECUÇÃO CAIXA
                    $stmt->close();
                    $conn->close();
                    header('Location: ../pag/caixa.php?BD=execInsert');
                    exit;
                }
            }
            #ERRO CONEXAO
            else{
                $conn->close();
                header('Location: ../pag/cliente.php?BD=stmt');
                exit;
            }
        }

        #ERRO EXECUÇÃO USUARIO
        else{
            $stmt->close();
            $conn->close();
            header('Location: ../pag/caixa.php?BD=execUsuario');
            exit;
        }
    }

    #ERRO CONEXAO
    else{
        $conn->close();
        header('Location: ../pag/cliente.php?BD=stmt');
        exit;
    }
}
else{
    #ERRO VALORES
    $conn->close();
    header('Location: ../pag/caixa.php?BD=valores');
    exit;
}
?>