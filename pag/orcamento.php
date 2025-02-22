<?php include_once "main.php";?>
<div class="container formulario">
    <div style="background-color: #212529; color: white; padding: 1%; margin-left: -1.2%; margin-right: -1.2%;">
        <a class="btn btn-secondary" href="orcamento.php" role="button">Cadastrar</a>
        <a class="btn btn-primary" href="verOrcamento.php" role="button">Ver</a>
    </div>
    <h1>Orçamento:</h1>
    <form style="padding: 1%;">
        <div class="mb-3">
            <label for="exampleInputCPF1" class="form-label">CPF:</label>
            <input type="number" class="form-control" id="exampleInputCPF1" aria-describedby="cpfHelp" placeholder="00000000000">
        </div>
        <div class="mb-3">
            <label for="exampleInputNident1" class="form-label">N° identificador:</label>
            <input type="number" class="form-control" id="exampleInputNident1" aria-describedby="nidentHelp" placeholder="00000">
        </div>
        <div class="mb-3">
            <label for="exampleInputData1" class="form-label">Data:</label>
            <input type="date" class="form-control" id="exampleInputData1" aria-describedby="dataHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputValor1" class="form-label">Valor R$:</label>
            <input type="number" class="form-control" id="exampleInputValor1" aria-describedby="valorHelp" placeholder="R$00.00">
        </div>
        <div class="mb-3">
            <label for="exampleInputDescricao1" class="form-label">Descrição:</label>
            <input type="text" class="form-control" id="exampleInputDescricao1" aria-describedby="descricaoHelp" placeholder="Exemplo de descrição do serviço">
        </div>
        <div class="mb-3">
            <label for="exampleInputFoto1" class="form-label">Foto antes:</label>
            <input type="file" class="form-control" id="exampleInputFoto1" aria-describedby="fotoHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputFoto2" class="form-label">Foto depois:</label>
            <input type="file" class="form-control" id="exampleInputFoto2" aria-describedby="fotoHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
