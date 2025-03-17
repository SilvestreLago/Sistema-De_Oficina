<?php include_once '../php/index.php'?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Relatório Completo do Sistema</title>
  <style>
    body { 
      margin: 20px; 
    }
    table {
      border-collapse: collapse;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #333;
      padding: 10px;
    }
    thead, th{
      background-color: #333;
      color: white;
    }
    .negativo {
      color: red;
    }
    .positivo {
      color: green;
    }
  </style>
</head>
<body>
<?php 
    #CONECTAR AO BD
    include_once('../php/conexao.php');

    date_default_timezone_set('America/Sao_Paulo');

    $nIdentificador = htmlspecialchars(strip_tags($_GET['nIdentificador'])) ?? NULL;

    if($nIdentificador == NULL){
        header('Location: ../pag/verOrcamento.php?BD=exec');
    }

    $sql = "SELECT * FROM SistemaOficina.Orcamento WHERE nIdentificador = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('i', $nIdentificador);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $nome = $row['nome'];
            $data = $row['data'];
            $dataFormatada = date('d/m/Y', strtotime($data));
            $valor = $row['valor'];
            $descricao = $row['descricao'];
            $nIdentificador = $row['nIdentificador'];
        }
        else{
            $stmt->close();
            $conn->close();
            header('Location: ../pag/verOrcamento.php?BD=exec');
        }
    }
    else{
        $conn->close();
        header('Location: ../pag/verOrcamento.php?BD=stmt');
    }
?>
<div class="container">
    <!-- CABEÇALHO -->
    <header class="text-center">
      <h1 class="mt-4" style="text-align: center; color:red; font-style: italic; font-size: 2em;">Oficina <span style="color: blue;">Campinense</span></h1>
      <p style="text-align: center;">Orçamento gerado em: <?php echo $dataFormatada;?></p>
    </header>

    <p><strong>Telefone para contato:</strong>(74) 9 9975-2939</p>
    <p><strong>Telefone para contato:</strong>(74) 9 9191-4191</p>
    <p><strong>Telefone para contato:</strong>(74) 9 9128-9767</p>
    <p><strong>Endereço:</strong>Rua Coronel Hermenegildo, 126 - Missão - Jacobina - BA.</p>

    <!-- ORCAMENTO -->
    <section id="estoque">
        <h2 class="section-title">Orçamento:</h2>
        <p><strong>Nome:</strong> <?php echo "$nome"?></p>
        <hr>
        <p><strong>Descrição:</strong> <?php echo "$descricao"?></p>
        <hr>
        <p><strong>Valor:</strong> R$ <?php echo "$valor"?></p>
        <hr>
        <p><strong>Data:</strong> <?php echo "$dataFormatada"?></p>
        <hr>
        <p><strong>Número de identificação:</strong> <?php echo "$nIdentificador"?></p>
        <hr>
    </section>
</div>
</body>
</html>
