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
  $data = date('d/m/Y H:i');

  $sql = "SELECT * FROM SistemaOficina.Estoque";
  $result = $conn->query($sql);


  # Contagem de ordens de serviço e orçamentos
  $sqlOrdemServico = "SELECT COUNT(*) AS TOTAL FROM SistemaOficina.ordemServico";
  $resultOrdemServico = $conn->query($sqlOrdemServico);
  $resultOrdemServico = $resultOrdemServico->fetch_assoc();

  $sqlOrcamento = "SELECT COUNT(*) AS TOTAL FROM SistemaOficina.Orcamento";
  $resultOrcamento = $conn->query($sqlOrcamento);
  $resultOrcamento = $resultOrcamento->fetch_assoc();
?>
<div class="container">
    <!-- CABEÇALHO -->
    <header class="text-center">
      <h1 class="mt-4" style="text-align: center; color:red; font-style: italic; font-size: 2em;">Oficina <span style="color: blue;">Campinense</span></h1>
      <p style="text-align: center;">Relatório de estoque gerado em: <?php echo $data;?></p>
    </header>

    <!-- ESTOQUE -->
    <section id="estoque">
      <h2 class="section-title">Itens do Estoque:</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Nome do Produto</th>
              <th>Quantidade</th>
            </tr>
          </thead>

          <tbody>
            <?php 
              $key = 1;
              foreach($result as $row){
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['quantidade']."</td>";
                echo "</tr>";
              }
              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- O.S E ORÇAMENTOS -->
    <section id="resumo">
      <h2 class="section-title">Resumo Serviços</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Orçamentos</th>
              <th>Ordens de Serviço</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><?php echo $resultOrcamento['TOTAL']?></td>
              <td><?php echo $resultOrdemServico['TOTAL']?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
</div>
</body>
</html>
