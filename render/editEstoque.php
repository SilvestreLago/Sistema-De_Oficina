<?php 
#CONECTAR AO BD
include_once '../php/conexao.php';

$nome =htmlentities(strip_tags( $_GET['nome'])) ?? NULL;

if ($nome != NULL) {
    $sql = "SELECT * FROM Estoque WHERE nome = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('s', $nome);
    
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $valores = $resultado->fetch_assoc();

            $nome = $valores['nome'];
            $quantidade = $valores['quantidade'];

            echo '<div class="container formulario">
                    <?php include_once "../php/alerts.php";?>
                    <form style="padding: 1%; margin-top: -13%" action="../php/editEstoque.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputNome1" class="form-label">Nome do produto:</label>
                            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="'.$nome.'" name="nome">
                            <input type="hidden" name="nomeAntigo" value="'.$nome.'">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputQuantidade1" class="form-label">Quantidade:</label>
                            <input type="number" class="form-control" id="exampleInputQuantidade1" aria-describedby="quantidadeHelp" placeholder="'.$quantidade.'" max="999999999" name="quantidade">
                        </div>

                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>';
        }
    }
}
?>