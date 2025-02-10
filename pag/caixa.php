<?php include_once "main.php";?>
<div class="container formulario">
    <h1>Caixa:</h1>
    <div class="mb-3">
        <h2>R$00,00</h2>
    </div>
    <form style="padding: 1%;">
        <div class="mb-3">
            <label for="exampleInputDinheiro1" class="form-label">Adicionar R$:</label>
            <input type="number" class="form-control" id="exampleInputDinheiro1" aria-describedby="dinheiroHelp">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button> 
    </form>
    <form action="" style="padding: 1%;">
        <div class="mb-3">
            <label for="exampleInputQuantidade2" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="exampleInputQuantidade2" aria-describedby="quantidadeHelp">
        </div>
        <button type="submit" class="btn btn-primary">Remover</button> 
    </form>
</div>
