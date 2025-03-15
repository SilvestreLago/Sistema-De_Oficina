<?php include_once 'main.php';?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-primary" href="caixa.php" role="button" >Cadastrar</a>
        <a class="btn btn-secondary" href="historico.php" role="button">Ver</a>
    </div>
    <h1>Histórico:</h1>
    <form style="padding: 1%;" action="" method="post">
        <div class="mb-3">
            <label for="exampleInputNome1" class="form-label">Data:</label>
            <input required type="date" class="form-control" id="exampleInputNome1" name="data" required> 
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
<?php 
if(isset($_POST['data'])){
    include_once '../php/historico.php';
}
?>