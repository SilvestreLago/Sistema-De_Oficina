<?php 
#CONECTAR AO BD
include_once "./conexao.php";

#COLETA OS DADOS
$usuario = htmlspecialchars(strip_tags($_POST['nome'])) ?? NULL;
$senha = htmlspecialchars(strip_tags($_POST['senha'])) ?? NULL;

if($usuario != NULL and $senha != NULL){
    #SQL
    $sql = 'SELECT nome, senha, acesso FROM SistemaOficina.Usuarios WHERE nome = ?';

    #SQL INJECTION
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $usuario);

    if($stmt->execute()){
        #EXECUÇÃO OK
        $resultado = $stmt->get_result();
        $credencial = $resultado->fetch_assoc();

        #VERIFICAÇÃO DE SENHA
        if($credencial and password_verify($senha, $credencial['senha'])){
            #CRIAR SESSÕES DE ACESSO
            session_start();
            $_SESSION['login'] = TRUE;
            $_SESSION['acesso'] = $credencial['acesso'];
            $_SESSION['usuario'] = $credencial['nome'];

            #REDIRECIONAMENTO
            $stmt->close();
            $conn->close();
            header('Location: ../pag/index.php');
            exit;
        }

        #SENHA ERRADA
        else{
            #DESTROI POSSÍVEIS SESSÕES
            session_start();
            unset($_SESSION['login']);
            unset($_SESSION['acesso']);
            unset($_SESSION['usuario']);
            session_destroy();

            #REDIRECIONAMENTO
            $stmt->close();
            $conn->close();
            header('Location: ../index.php?BD=acesso');
            exit;
        }
    }
    
    #ERRO EXECUXÃO
    else{
        $stmt->close();
        $conn->close();
        header('Location: ../index.php?BD=acesso');
        exit;
    }
}

#ERRO VALORES NULOS
else{
    $conn->close();
    header('Location: ../index.php?BD=acesso');
    exit;
}

?>