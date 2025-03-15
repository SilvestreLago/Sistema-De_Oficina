<?php include_once "main.php";?>
<div class="container formulario">
    <div style="background-color: #212529; color: white; padding: 1%; margin-left: -1.2%; margin-right: -1.2%;">
        <a class="btn btn-secondary" href="orcamento.php" role="button">Cadastrar</a>
        <a class="btn btn-primary" href="verOrcamento.php" role="button">Ver</a>
    </div>
    <h1>Orçamento:</h1>
    <?php include_once '../php/alerts.php';?>
    <form style="padding: 1%;" action="../php/cadOrcamento.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputCPF1" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Fulano da Silva" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputNident1" class="form-label">N° identificador:</label>
            <input type="number" class="form-control" id="exampleInputNident1" aria-describedby="nidentHelp" placeholder="00000" max="999999999" name="nIdentificador" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputData1" class="form-label">Data:</label>
            <input type="date" class="form-control" id="exampleInputData1" aria-describedby="dataHelp" name="data" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputValor1" class="form-label">Valor R$:</label>
            <input type="number" class="form-control" id="exampleInputValor1" aria-describedby="valorHelp" placeholder="R$00.00" max="999999999" name="valor">
        </div>
        <div class="mb-3">
            <label for="exampleInputDescricao1" class="form-label">Descrição:</label>
            <input type="text" class="form-control" id="exampleInputDescricao1" aria-describedby="descricaoHelp" placeholder="Exemplo de descrição do serviço" name="descricao">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
