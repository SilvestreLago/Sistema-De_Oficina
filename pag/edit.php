<?php include_once "./main.php";?>

<div class="container formulario">
    <h1>Cliente:</h1>
    <form style="padding: 1%;">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Usuário:</label>
            <input required type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Usuário">
        </div>
        <div class="mb-3">
            <label for="exampleInputEndereco1" class="form-label">Senha:</label>
            <input type="text" class="form-control" id="exampleInputEndereco1" aria-describedby="enderecoHelp" placeholder="********">
        </div>
        <div class="mb-3">
            <input type="checkbox" id="confirmar" name="confirmar" required>
            <label for="confirmar">Certeza que deseja alterar as informações do usuário?</label>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>