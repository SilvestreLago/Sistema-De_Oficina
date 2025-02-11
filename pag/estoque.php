<?php include_once "main.php";?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="estoque.php" role="button">Cadastrar</a>
        <a class="btn btn-primary" href="verEstoque.php" role="button">Ver</a>
    </div>
    <h1>Estoque:</h1>
    <form style="padding: 1%;">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Nome do produto:</label>
            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Item 0">
        </div>
        <div class="mb-3">
            <label for="exampleInputQuantidade1" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="exampleInputQuantidade1" aria-describedby="quantidadeHelp" placeholder="0">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
