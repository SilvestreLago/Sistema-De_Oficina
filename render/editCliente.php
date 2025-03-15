<?php 
#CONECTAR AO BD
include_once '../php/conexao.php';

$nome =htmlentities(strip_tags( $_GET['nome'])) ?? NULL;

if ($nome != NULL) {
    $sql = "SELECT * FROM Cliente WHERE nome = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('s', $nome);
    
        if($stmt->execute()){
            $resultado = $stmt->get_result();
            $valores = $resultado->fetch_assoc();

            $nome = $valores['nome'];
            $endereco = $valores['endereco'];
            $telefone = $valores['tel'];
            $cpf = $valores['cpf'];

            #RENDERIZAÇÃO
            echo'<div class="container formulario">
                    <?php include_once "../php/alerts.php";?>
                    <form style="padding: 1%; margin-top: -13%" action="../php/editCliente.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputNome1" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder="'.$nome.'" name="nome">
                            <input type="hidden" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" value="'.$nome.'" name="nomeAntigo" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEndereco1" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" id="exampleInputEndereco1" aria-describedby="enderecoHelp" placeholder="'.$endereco.'" name="endereco">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTelefone1" class="form-label">Telefone:</label>
                            <input type="number" class="form-control" id="exampleInputTelefone1" aria-describedby="telefoneHelp" placeholder="'.$telefone.'" max="99999999999" name="tel">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCPF1" class="form-label">CPF:</label>
                            <input type="number" class="form-control" id="exampleInputCPF1" aria-describedby="cpfHelp" placeholder="'.$cpf.'" max="99999999999" name="cpf">
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>';
        }
    }
}
?>