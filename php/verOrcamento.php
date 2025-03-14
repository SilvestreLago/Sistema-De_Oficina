<?php
#CONECTAR AO BD
include_once './conexao.php';

$termo = isset($_GET['q']) ? $_GET['q'] : '';

if ($termo != '') {
    $sql = "SELECT * FROM Orcamento WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$termo%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
    echo json_encode($dados);
}

$conn->close();
?>
