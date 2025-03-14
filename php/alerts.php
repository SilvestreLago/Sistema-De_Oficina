<?php
if(isset($_GET['BD'])){
    switch($_GET['BD']){
        #ERRO
        case 'IDCliente':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Cliente inexistente!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'exec':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro ao executar!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'execInsert':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro ao executar a inserção!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'execUsuario':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro ao executar pelo usuário!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'valores':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Necessário inserir um valor!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
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
        case 'acesso':
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Usuário ou senha incorretos! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;

        #OK
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
        case 'caixa':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Valor cadastrado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'alterado':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Dados alterado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
        case 'addUser':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Usuário adicionado com sucesso!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
            break;
    }
}
?>