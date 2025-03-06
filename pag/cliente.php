<?php include_once "main.php";?>

<div class="container formulario">
    
    <div class="titulo">
        <a class="btn btn-secondary" href="cliente.php" role="button" >Cadastrar</a>
        <a class="btn btn-primary" href="verCliente.php" role="button">Ver</a>
    </div>
    <h1>Cliente:</h1>
    <?php include_once '../php/alerts.php';?>
    <form style="padding: 1%;" action="../php/cadCliente.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Nome:</label>
            <input required type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="Fulano da Silva" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEndereco1" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="exampleInputEndereco1" aria-describedby="enderecoHelp" placeholder="Rua XYZ n°0" name="endereco">
        </div>
        <div class="mb-3">
            <label for="exampleInputTelefone1" class="form-label">Telefone:</label>
            <input type="number" class="form-control" id="exampleInputTelefone1" aria-describedby="telefoneHelp" placeholder="74912345678" max="99999999999" name="tel">
        </div>
        <div class="mb-3">
            <label for="exampleInputCPF1" class="form-label">CPF:</label>
            <input type="number" class="form-control" id="exampleInputCPF1" aria-describedby="cpfHelp" placeholder="00000000000" max="99999999999" name="cpf">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
