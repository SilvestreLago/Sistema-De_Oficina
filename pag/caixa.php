<?php include_once "main.php";?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="caixa.php" role="button" >Cadastrar</a>
        <a class="btn btn-primary" href="historico.php" role="button">Ver</a>
    </div>
    <h1>Caixa:</h1>
    <h1>R$ 00,00</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="card-title">Físico</h1>
                    <div>
                        <h2 class="valorTotal">R$ 00,00</h2>
                    </div>
                    <form action="" style="margin-bottom: 1%;">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text"><input type="submit" value="ADICIONAR" class="btn btn-primary"></span>
                        </div>
                    </form>
                    <form action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text"><input type="submit" value="REMOVER" class="btn btn-danger"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="card-title">Cartão</h1>
                    <div>
                        <h2 class="valorTotal">R$ 00,00</h2>
                    </div>
                    <form action="" style="margin-bottom: 1%;">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text"><input type="submit" value="ADICIONAR" class="btn btn-primary"></span>
                        </div>
                    </form>
                    <form action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text"><input type="submit" value="REMOVER" class="btn btn-danger"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="card-title">Banco</h1>
                    <div>
                        <h2 class="valorTotal">R$ 00,00</h2>
                    </div>
                    <form action="" style="margin-bottom: 1%;">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text"><input type="submit" value="ADICIONAR" class="btn btn-primary"></span>
                        </div>
                    </form>
                    <form action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text"><input type="submit" value="REMOVER" class="btn btn-danger"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
