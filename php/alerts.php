<?php
if(isset($_GET['BD'])){
    switch($_GET['BD']){
        case 'exec':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro ao executar!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'stmt':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro de conexão!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'fotoAntes':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro upload foto antes!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'fotoDepois':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro upload foto depois!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'nome':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Necessário cadastrar o nome! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'nIdentificador':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Necessário cadastrar o número de identificação! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'cliente':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Cliente cadastrado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'orcamento':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Orcamento cadastrado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'ordemServico':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Ordem de Serviço cadastrado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'estoque':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Item cadastrado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
    }
}
?>