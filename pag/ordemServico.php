<?php include_once "main.php";?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="ordemServico.php" role="button">Cadastrar</a>
        <a class="btn btn-primary" href="verOrdemServico.php" role="button">Ver</a>
    </div>
    <h1>Ordem de serviço:</h1>
    <?php include_once '../php/alerts.php';?>
    <form style="padding: 1%;" action="../php/cadOrdemServico.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputCPF1" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Fulano da Silva" name="nome">
        </div>
        <div class="mb-3">
            <label for="exampleInputNident1" class="form-label">N° identificador:</label>
            <input type="number" class="form-control" id="exampleInputNident1" aria-describedby="nidentHelp" placeholder="00000" max="999999999" name="nIdentificador" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputData1" class="form-label">Data entrada:</label>
            <input type="date" class="form-control" id="exampleInputData1" aria-describedby="dataHelp" name="dataEntrada" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputData2" class="form-label">Data saída:</label>
            <input type="date" class="form-control" id="exampleInputData2" aria-describedby="dataHelp" name="dataSaida">
        </div>
        <div class="mb-3">
            <label for="exampleInputDescricao1" class="form-label">Observação:</label>
            <input type="text" class="form-control" id="exampleInputDescricao1" aria-describedby="descricaoHelp" placeholder="Exemplo de observação" name="observacao">
        </div>
        <div class="mb-3">
            <label for="exampleInputFoto1" class="form-label">Foto antes:</label>
            <input type="file" class="form-control" id="inputText3" name="fotoAntes" accept="image/png">
        </div>
        <div class="mb-3">
            <label for="exampleInputFoto2" class="form-label">Foto depois:</label>
            <input type="file" class="form-control" id="inputText3" name="fotoDepois" accept="image/png">

        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
