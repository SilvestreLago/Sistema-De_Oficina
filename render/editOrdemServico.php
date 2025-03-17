<?php 
#CONECTAR AO BD
include_once '../php/conexao.php';

$nIdentificador =htmlentities(strip_tags( $_GET['nIdentificador'])) ?? NULL;

if ($nIdentificador != NULL) {
    $sql = "SELECT * FROM ordemServico WHERE nIdentificador = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('i', $nIdentificador);
    
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $valores = $resultado->fetch_assoc();

            $nome = $valores['nome'];
            $nIdentificador = $valores['nIdentificador'];
            $dataEntrada = date('d/m/Y', strtotime($valores['dataEntrada']));;
            $dataSaida = date('d/m/Y', strtotime($valores['dataSaida']));;
            $observacao = $valores['observacao'];
            $fotoAntes = $valores['fotoAntes'];
            $fotoDepois = $valores['fotoDepois'];

            #RENDERIZAÇÃO
            echo'<div class="container formulario">
                    <?php include_once "../php/alerts.php";?>
                    <form style="padding: 1%; margin-top: -13%;" action="../php/editOrdemServico.php" method="POST" enctype="multipart/form-data">
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
                            <label for="exampleInputData1" class="form-label">Data entrada:</label>
                            <input type="date" class="form-control" id="exampleInputData1" aria-describedby="dataHelp" name="dataEntrada">
                            <p class="text-muted">Data entrada: '.$dataEntrada.'</p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputData2" class="form-label">Data saída:</label>
                            <input type="date" class="form-control" id="exampleInputData2" aria-describedby="dataHelp" name="dataSaida">
                            <p class="text-muted">Data saída: '.$dataSaida.'</p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescricao1" class="form-label">Observação:</label>
                            <input type="text" class="form-control" id="exampleInputDescricao1" aria-describedby="descricaoHelp" placeholder="'.$observacao.'" name="observacao">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputFoto1" class="form-label">Foto antes:</label>
                            <input type="file" class="form-control" id="inputText3" name="fotoAntes" accept="image/png">
                            <img src="'.$fotoAntes.'" alt="Foto antes" style="width: 100px; height: 100px;">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputFoto2" class="form-label">Foto depois:</label>
                            <input type="file" class="form-control" id="inputText3" name="fotoDepois" accept="image/png">
                            <img src="'.$fotoDepois.'" alt="Foto depois" style="width: 100px; height: 100px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>';
        }
    }
}
?>