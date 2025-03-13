<?php
session_start(); 
include_once "./main.php";
?>

<div class="container formulario">
    <h1>Editar:</h1>
    <?php include_once '../php/alerts.php'?>
    <form style="padding: 1%;" action="../php/editUser.php" method="POST">
        <div class="mb-3">
            <input type="checkbox" id="delete" name="delete">
            <label for="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg>Apagar usuário?</label>
        </div>
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