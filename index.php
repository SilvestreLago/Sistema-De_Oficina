<?php 
#VERIFICA SE O USUÁRIO ESTÁ LOGADO VIA SESSÃO
session_start();
if(isset($_SESSION['login'])){
    header('Location: ./pag/index.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="./style/style.css">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="./bootstrap/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <script src="./bootstrap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body class="body">
        <div class="container formLogin" style="max-width: 500px;">
            <h1>LOGIN</h1>
            <?php include_once "./php/alerts.php";?>
            <form action="./php/login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputUser1" class="form-label">Usuário:</label>
                    <input type="text" class="form-control" id="exampleInputUser1" aria-describedby="userHelp" placeholder="Usuário" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="********" name="senha" required>
                </div>
                <button type="submit" class="btn btn-primary container">Entrar</button>
            </form>
        </div>
    </body>
</html>