<?php include_once "main.php";?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="caixa.php" role="button" >Cadastrar</a>
        <a class="btn btn-primary" href="historico.php" role="button">Ver</a>
    </div>
    <h1>Caixa:</h1>
    <div class="mb-3">
        <h2>R$00,00</h2>
    </div>
    <form>
        <div class="mb-3">
            <label for="exampleInputDinheiro1" class="form-label">Adicionar R$:</label>
            <input type="number" class="form-control" id="exampleInputDinheiro1" aria-describedby="dinheiroHelp" placeholder="R$00.00">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button> 
    </form>
    <form style="padding: 1% 0%;">
        <div class="mb-3">
            <label for="exampleInputQuantidade2" class="form-label">Remover:</label>
            <input type="number" class="form-control" id="exampleInputQuantidade2" aria-describedby="removerHelp" placeholder="R$00.00">
        </div>
        <button type="submit" class="btn btn-primary">Remover</button> 
    </form>
</div>
