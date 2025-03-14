<?php 
#CONECTAR AO BD
include_once '../php/conexao.php';

$nIdentificador =htmlentities(strip_tags( $_GET['nIdentificador'])) ?? NULL;

if ($nIdentificador != NULL) {
    $sql = "SELECT * FROM Orcamento WHERE nIdentificador = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('i', $nIdentificador);
    
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $valores = $resultado->fetch_assoc();

            $nome = $valores['nome'];
            $nIdentificador = $valores['nIdentificador'];
            $data = $valores['data'];
            $valor = $valores['valor'];
            $descricao = $valores['descricao'];

            #RENDERIZAÇÃO
            echo'<div class="container formulario">
                    <?php include_once "../php/alerts.php";?>
                    <form style="padding: 1%; margin-top: -13%;" action="../php/editOrcamento.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputCPF1" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="'.$nome.'" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNident1" class="form-label">N° identificador:</label>
                            <input type="number" class="form-control" id="exampleInputNident1" aria-describedby="nidentHelp" placeholder="'.$nIdentificador.'" max="999999999" name="nIdentificador">
                            <input type="hidden" name="nIdentificadorAntigo" value="'.$nIdentificador.'">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputData1" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="exampleInputData1" aria-describedby="dataHelp" name="data">
                            <p id="dataHelp" class="form-text">Data do orçamento: '.$data.'</p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputValor1" class="form-label">Valor R$:</label>
                            <input type="number" class="form-control" id="exampleInputValor1" aria-describedby="valorHelp" placeholder="'.$valor.'" max="999999999" name="valor">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescricao1" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="exampleInputDescricao1" aria-describedby="descricaoHelp" placeholder="'.$descricao.'" name="descricao">
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>';
        }
    }
}
?>