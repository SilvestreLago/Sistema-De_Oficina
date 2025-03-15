<?php
session_start(); 
include_once "./main.php";
?>

<div class="container formulario">
    <h1>Editar:</h1>
    <?php include_once '../php/alerts.php'?>
    <form style="padding: 1%;" action="../php/editUser.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Usuário:</label>
            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Usuário" name="usuario">
        </div>
        <div class="mb-3">
            <label for="exampleInputEndereco1" class="form-label">Senha:</label>
            <input type="passwd" class="form-control" id="exampleInputEndereco1" aria-describedby="enderecoHelp" placeholder="********" name="senha">
        </div>
        <div class="mb-3">
            <input type="checkbox" id="confirmar" name="confirmar" required>
            <label for="confirmar">Certeza que deseja alterar as informações do usuário?</label>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>

    <?php
    if(isset($_SESSION['acesso']) && $_SESSION['acesso'] == 1){
        echo '
        <h1>Adicionar usuário:</h1>
        <form style="padding: 1%;" action="../php/cadUser.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputNome1" class="form-label">Usuário:</label>
                <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Usuário" name="usuario">
            </div>
            <div class="mb-3">
                <label for="exampleInputEndereco1" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="exampleInputEndereco1" aria-describedby="enderecoHelp" placeholder="********" name="senha">
            </div>
            <div class="mb-3">
                <input type="checkbox" id="acesso" name="acesso" value="1">
                <label for="acesso">Permitir acesso administrador?</label>
            </div>
            <div class="mb-3">
                <input type="checkbox" id="confirmar1" name="confirmar1" required>
                <label for="confirmar1">Certeza que deseja adicionar o usuário?</label>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>';
    }
    ?>
</div>