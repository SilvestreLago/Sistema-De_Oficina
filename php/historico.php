<?php 
#CONECTA AO BD
include_once '../php/conexao.php';

#DATA
$data = htmlspecialchars(strip_tags($_POST['data'])) ?? NULL;

if($data != NULL){
    #SQL
    $sql = "SELECT * FROM SistemaOficina.Caixa WHERE data = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data);
    
    if($stmt->execute()){
        
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            $idTable = 1;
            echo '<div class="container" style="margin-top: -4%;">
                    <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Valor:</th>
                        <th scope="col">Data:</th>
                        <th scope="col">Tipo:</th>
                        <th scope="col">Usuário:</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">';

            while($row = $result->fetch_assoc()){
                #FORMATAÇÃO DA DATA
                $data_formatada = date("d/m/Y", strtotime($row['data']));

                #SQL NOME
                $sqlNome = "SELECT nome FROM SistemaOficina.Usuarios WHERE idUsuario = ?";
                $stmtNome = $conn->prepare($sqlNome);
                $stmtNome->bind_param("i", $row['idUsuario']);
                $stmtNome->execute();
                $resultNome = $stmtNome->get_result();
                $rowNome = $resultNome->fetch_assoc();
                $stmtNome->close();
                echo '<tr>
                        <th scope="row">' . $idTable . '</th>
                        <td>' . $row['valor'] . '</td>
                        <td>' . $data_formatada . '</td>
                        <td>' . $row['tipo'] . '</td>
                        <td>' . $rowNome['nome'] . '</td>
                    </tr>';
                $idTable++;
            }
            echo'</tbody>
            </table>
        </div>';

            $stmt->close();
            $conn->close();
            exit();

        }
        
        else{
            echo "<p class='container' style = 'background-color: white; padding:1%; text-align: center; margin-top: -4%;'>Nenhum registro encontrado!</p>";
            $stmt->close();
            $conn->close();
            exit();
        }
    }
    
    else{
        echo "<p class='container' style = 'background-color: white; padding:1%; text-align: center; margin-top: -4%;'>Erro de execução!</p>";
        $stmt->close();
        $conn->close();
        exit();
    }
}

else{
    echo "<p class='container' style = 'background-color: white; padding:1%; text-align: center; margin-top: -4%;'>Insira uma data!</p>";
    $conn->close();
    exit();
}

$conn->close();
exit();
?>
