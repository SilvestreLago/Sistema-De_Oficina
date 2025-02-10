<?php include_once "main.php";?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="cliente.php" role="button" >Cadastrar</a>
        <a class="btn btn-primary" href="verCliente.php" role="button">Ver</a>
    </div>
    <h1>Cliente:</h1>
    <form style="padding: 1%;">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Nome:</label>
            <input required type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEndereco1" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="exampleInputEndereco1" aria-describedby="enderecoHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputTelefone1" class="form-label">Telefone:</label>
            <input type="tel" class="form-control" id="exampleInputTelefone1" aria-describedby="telefoneHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputCPF1" class="form-label">CPF:</label>
            <input type="number" class="form-control" id="exampleInputCPF1" aria-describedby="cpfHelp">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
