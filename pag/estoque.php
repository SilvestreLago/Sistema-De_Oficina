<?php include_once "main.php";?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="estoque.php" role="button">Cadastrar</a>
        <a class="btn btn-primary" href="verEstoque.php" role="button">Ver</a>
    </div>
    <h1>Estoque:</h1>
    <?php include_once '../php/alerts.php';?>
    <form style="padding: 1%;" action="../php/cadEstoque.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Nome do produto:</label>
            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Item 0" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputQuantidade1" class="form-label">Quantidade:</label>
            <input type="text" class="form-control" id="exampleInputQuantidade1" aria-describedby="quantidadeHelp" placeholder="0" name="quantidade">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
