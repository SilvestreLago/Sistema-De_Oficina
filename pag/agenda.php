<!-- BOTÃO ADICIONAR -->
<div class="btn-add fixed-bottom" style="left: revert; margin: 1%;">
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/></svg>
    </button>
</div>

<!-- MODAL ADCIONAR -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADICIONE NA AGENDA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../php/cadAgenda.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome do cliente:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fulano da Silva" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Data: </label>
                        <input class="form-control" id="exampleFormControlTextarea1" name="data" type="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">N° do orçamento:</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="000000" name="orcamento" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">N° da O.S:</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="000000" name="os" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                    <button type="submit" name="pagina" value="index" class="btn btn-primary">ADICIONAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "main.php";?>

<div class="container" style="margin-top: 10%;">
    <?php include_once '../php/alerts.php'?>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome:</th>
          <th scope="col">Data:</th>
          <th scope="col">N° Orçamento:</th>
          <th scope="col">N° O.S:</th>
          <th scope="col">Exluir:</th>
          <th scope="col">Concluir:</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <form action="../php/concluir.php" method="post">
            <?php include_once '../php/verAgenda.php'?>
        </form>
      </tbody>
    </table>
</div>