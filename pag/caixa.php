<?php include_once "main.php";?>
<?php include_once "../php/showCaixa.php"?>
<div class="container formulario">
    <div class="titulo">
        <a class="btn btn-secondary" href="caixa.php" role="button" >Cadastrar</a>
        <a class="btn btn-primary" href="historico.php" role="button">Ver</a>
    </div>
    <h1>Caixa:</h1>
    <?php include_once '../php/alerts.php';?>
    <h1>R$ <?php echo $Total['Valor']?></h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="card-title">Físico</h1>
                    <div>
                        <h2 class="valorTotal">R$ <?php echo $Fisico['Valor']?></h2>
                    </div>
                    <form action="../php/cadCaixa.php" method="post" style="margin-bottom: 1%;">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="valor" placeholder="00,00" max="99999999" required>
                            <input type="hidden" name="tipo" value="Fisico" required>
                            <input type="hidden" name="remover" value="FALSE" required>
                            <span class="input-group-text"><input type="submit" value="ADICIONAR" class="btn btn-primary"></span>
                        </div>
                    </form>
                    <form action="../php/cadCaixa.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="valor" placeholder="00,00" max="99999999" required>
                            <input type="hidden" name="tipo" value="Fisico" required>
                            <input type="hidden" name="remover" value="TRUE" required>
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
                        <h2 class="valorTotal">R$ <?php echo $Cartao['Valor']?></h2>
                    </div>
                    <form action="../php/cadCaixa.php" method="post" style="margin-bottom: 1%;">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="valor" placeholder="00,00" max="99999999" required>
                            <input type="hidden" name="tipo" value="Cartao" required>
                            <input type="hidden" name="remover" value="FALSE" required>
                            <span class="input-group-text"><input type="submit" value="ADICIONAR" class="btn btn-primary"></span>
                        </div>
                    </form>
                    <form action="../php/cadCaixa.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="valor" placeholder="00,00" max="99999999" required>
                            <input type="hidden" name="tipo" value="Cartao" required>
                            <input type="hidden" name="remover" value="TRUE" required>
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
                        <h2 class="valorTotal">R$<?php echo $Banco['Valor']?></h2>
                    </div>
                    <form action="../php/cadCaixa.php" method="post" style="margin-bottom: 1%;">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="valor" placeholder="00,00" max="99999999" required>
                            <input type="hidden" name="tipo" value="Banco" required>
                            <input type="hidden" name="remover" value="FALSE" required>
                            <span class="input-group-text"><input type="submit" value="ADICIONAR" class="btn btn-primary"></span>
                        </div>
                    </form>
                    <form action="../php/cadCaixa.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="valor" placeholder="00,00" max="99999999" required>
                            <input type="hidden" name="tipo" value="Banco" required>
                            <input type="hidden" name="remover" value="TRUE" required>
                            <span class="input-group-text"><input type="submit" value="REMOVER" class="btn btn-danger"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
