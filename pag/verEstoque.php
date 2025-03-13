<?php include_once "main.php";?>

<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-primary" href="estoque.php" role="button" >Cadastrar</a>
        <a class="btn btn-secondary" href="verEstoque.php" role="button">Ver</a>
    </div>

    <h1>Estoque:</h1>

    <?php include_once '../php/alerts.php'?>

    <form action="" class="d-flex" role="search" style="padding: 1%;">
        <label for="">Nome do produto:</label>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="pesquisa">
    </form>

    <div id="resultado" class="mt-3"></div>
</div>

<script src="../js/verEstoque.js"></script>

<?php
if(isset($_GET['nome'])){
    include_once '../render/editEstoque.php';
} 
?>