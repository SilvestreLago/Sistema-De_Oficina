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
        header('Location: ../pag/verOrdemServico.php?BD=exec');
    }

    $sql = "SELECT * FROM SistemaOficina.ordemServico WHERE nIdentificador = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('i', $nIdentificador);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $nome = $row['nome'];
            $dataEntrada = $row['dataEntrada'];
            $dataFormatadaEntrada = date('d/m/Y', strtotime($dataEntrada));
            $dataSaida = $row['dataSaida'];
            $dataFormatadaSaida = date('d/m/Y', strtotime($dataSaida));
            if($dataSaida == NULL){
                $dataFormatadaSaida = NULL;
            }
            $observacao = $row['observacao'];
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
      <p style="text-align: center;">Ordem de Serviço gerado em: <?php echo $dataFormatadaEntrada;?></p>
    </header>

    <!-- ORCAMENTO -->
    <section id="estoque">
        <h2 class="section-title">Ordem de Serviço:</h2>
        <p><strong>Nome:</strong> <?php echo "$nome"?></p>
        <hr>
        <p><strong>Observação:</strong> <?php echo "$observacao"?></p>
        <hr>
        <p><strong>Data de entrada:</strong> <?php echo "$dataFormatadaEntrada"?></p>
        <hr>
        <p><strong>Data de saída:</strong> <?php echo "$dataFormatadaSaida"?></p>
        <hr>
        <p><strong>Número de identificação:</strong> <?php echo "$nIdentificador"?></p>
        <hr>
    </section>
    <p><strong>Telefone para contato:</strong>(74) 9 9975-2939</p>
    <p><strong>Telefone para contato:</strong>(74) 9 9191-4191</p>
    <p><strong>Telefone para contato:</strong>(74) 9 9128-9767</p>
    <p><strong>Endereço:</strong>Rua Coronel Hermenegildo, 126 - Missão - Jacobina - BA.</p>
</div>
</body>
</html>
