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
  # CONECTAR AO BD
  include_once('../php/conexao.php');

  # Ajustar o formato da data para o padrão MySQL
  $data = htmlspecialchars(strip_tags($_POST['data']));
  $data = date("Y-m-d", strtotime($data));

  date_default_timezone_set('America/Sao_Paulo');
  $dataRelatorio = date('d/m/Y');

  # Queries SQL corrigidas com aspas simples
  $sqlEntradaFisico = "SELECT * FROM SistemaOficina.Caixa WHERE valor > 0 AND data = '$data' AND tipo = 'Fisico'";
  $resultEntradaFisico = $conn->query($sqlEntradaFisico);

  $sqlEntradaCartao = "SELECT * FROM SistemaOficina.Caixa WHERE valor > 0 AND data = '$data' AND tipo = 'Cartao'";
  $resultEntradaCartao = $conn->query($sqlEntradaCartao);

  $sqlEntradaBanco = "SELECT * FROM SistemaOficina.Caixa WHERE valor > 0 AND data = '$data' AND tipo = 'Banco'";
  $resultEntradaBanco = $conn->query($sqlEntradaBanco);

  $sqlSaidaFisico = "SELECT * FROM SistemaOficina.Caixa WHERE valor < 0 AND data = '$data' AND tipo = 'Fisico'";
  $resultSaidaFisico = $conn->query($sqlSaidaFisico);

  $sqlSaidaCartao = "SELECT * FROM SistemaOficina.Caixa WHERE valor < 0 AND data = '$data' AND tipo = 'Cartao'";
  $resultSaidaCartao = $conn->query($sqlSaidaCartao);

  $sqlSaidaBanco = "SELECT * FROM SistemaOficina.Caixa WHERE valor < 0 AND data = '$data' AND tipo = 'Banco'";
  $resultSaidaBanco = $conn->query($sqlSaidaBanco);

  # Inicialização das variáveis de soma
  $totalEntradaFisico = 0;
  $totalEntradaCartao = 0;
  $totalEntradaBanco = 0;
  $totalSaidaFisico = 0;
  $totalSaidaCartao = 0;
  $totalSaidaBanco = 0;
  $totalEntrada = 0;
  $totalSaida = 0;


  $data = date("d/m/Y", strtotime($data));

  ?>
<div class="container">
    <!-- CABEÇALHO -->
    <header class="text-center">
      <h1 class="mt-4" style="text-align: center; color:red; font-style: italic; font-size: 2em;">Oficina <span style="color: blue;">Campinense</span></h1>
      <p style="text-align: center;">Relatório de caixa gerado em: <?php echo $dataRelatorio;?></p>
      <p style="text-align: center;">Relatório de caixa referente a data: <?php echo $data?></p>
    </header>

    <!-- ENTRADAS FINANCEIRAS FÍSICO -->
    <section id="entradas">
      <h2 class="section-title">Entradas Financeiras Físico</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
              <th>Usuário</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            $key = 0;
              foreach($resultEntradaFisico as $row){
                $sqlNome = "SELECT * FROM SistemaOficina.Usuarios WHERE idUsuario = ".$row['idUsuario'];
                $resultNome = $conn->query($sqlNome);
                $nome = $resultNome->fetch_assoc();

                $dataFormatada = date('d/m/Y', strtotime($row['data']));
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$dataFormatada."</td>";
                echo "<td>R$ ".$row['valor']."</td>";
                echo "<td>".$nome['nome']."</td>";
                echo "</tr>";
                $totalEntradaFisico += $row['valor'];
                $totalEntrada += $row['valor'];
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ENTRADAS FINANCEIRAS CARTÃO -->
    <section id="entradas">
      <h2 class="section-title">Entradas Financeiras Cartão</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
              <th>Usuário</th>
            </tr>
          </thead>

          <tbody>
          <?php 
            $key = 0;
              foreach($resultEntradaCartao as $row){
                $sqlNome = "SELECT * FROM SistemaOficina.Usuarios WHERE idUsuario = ".$row['idUsuario'];
                $resultNome = $conn->query($sqlNome);
                $nome = $resultNome->fetch_assoc();

                $dataFormatada = date('d/m/Y', strtotime($row['data']));
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$dataFormatada."</td>";
                echo "<td>R$ ".$row['valor']."</td>";
                echo "<td>".$nome['nome']."</td>";
                echo "</tr>";
                $totalEntradaCartao += $row['valor'];
                $totalEntrada += $row['valor'];
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ENTRADAS FINANCEIRAS BANCO -->
    <section id="entradas">
      <h2 class="section-title">Entradas Financeiras Banco</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
              <th>Usuário</th>
            </tr>
          </thead>

          <tbody>
          <?php 
            $key = 0;
              foreach($resultEntradaBanco as $row){
                $sqlNome = "SELECT * FROM SistemaOficina.Usuarios WHERE idUsuario = ".$row['idUsuario'];
                $resultNome = $conn->query($sqlNome);
                $nome = $resultNome->fetch_assoc();

                $dataFormatada = date('d/m/Y', strtotime($row['data']));
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$dataFormatada."</td>";
                echo "<td>R$ ".$row['valor']."</td>";
                echo "<td>".$nome['nome']."</td>";
                echo "</tr>";
                $totalEntradaBanco += $row['valor'];
                $totalEntrada += $row['valor'];
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- SAÍDAS FINANCEIRAS FÍSICO -->
    <section id="saidas">
      <h2 class="section-title">Saídas Financeiras Físico</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
              <th>Usuário</th>
            </tr>
          </thead>

          <tbody>
          <?php 
            $key = 0;
              foreach($resultSaidaFisico as $row){
                $sqlNome = "SELECT * FROM SistemaOficina.Usuarios WHERE idUsuario = ".$row['idUsuario'];
                $resultNome = $conn->query($sqlNome);
                $nome = $resultNome->fetch_assoc();

                $dataFormatada = date('d/m/Y', strtotime($row['data']));
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$dataFormatada."</td>";
                echo "<td>R$ ".$row['valor']."</td>";
                echo "<td>".$nome['nome']."</td>";
                echo "</tr>";
                $totalSaidaFisico += $row['valor'];
                $totalSaida += $row['valor'];
              }
          ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- SAÍDAS FINANCEIRAS CARTÃO -->
    <section id="saidas">
      <h2 class="section-title">Saídas Financeiras Cartão</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
              <th>Usuário</th>
            </tr>
          </thead>

          <tbody>
          <?php 
            $key = 0;
              foreach($resultSaidaCartao as $row){
                $sqlNome = "SELECT * FROM SistemaOficina.Usuarios WHERE idUsuario = ".$row['idUsuario'];
                $resultNome = $conn->query($sqlNome);
                $nome = $resultNome->fetch_assoc();

                $dataFormatada = date('d/m/Y', strtotime($row['data']));
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$dataFormatada."</td>";
                echo "<td>R$ ".$row['valor']."</td>";
                echo "<td>".$nome['nome']."</td>";
                echo "</tr>";
                $totalSaidaCartao += $row['valor'];
                $totalSaida += $row['valor'];
              }
          ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- SAÍDAS FINANCEIRAS BANCO -->
    <section id="saidas">
      <h2 class="section-title">Saídas Financeiras Banco</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
              <th>Usuário</th>
            </tr>
          </thead>

          <tbody>
          <?php 
            $key = 0;
              foreach($resultSaidaBanco as $row){
                $sqlNome = "SELECT * FROM SistemaOficina.Usuarios WHERE idUsuario = ".$row['idUsuario'];
                $resultNome = $conn->query($sqlNome);
                $nome = $resultNome->fetch_assoc();

                $dataFormatada = date('d/m/Y', strtotime($row['data']));
                echo "<tr>";
                echo "<td>".$key++."</td>";
                echo "<td>".$dataFormatada."</td>";
                echo "<td>R$ ".$row['valor']."</td>";
                echo "<td>".$nome['nome']."</td>";
                echo "</tr>";
                $totalSaidaBanco += $row['valor'];
                $totalSaida += $row['valor'];
              }
          ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- RESUMO -->
    <section id="resumo">
      <h2 class="section-title">Resumo Caixa</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Entrada Físico</th>
              <th>Entrada Cartão</th>
              <th>Entrada Banco</th>
              <th>Entrada total</th>
              <th>Saída Físico</th>
              <th>Saída Cartão</th>
              <th>Saída Banco</th>
              <th>Saída total</th>
              <th>Saldo total</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="positivo">R$ <?php echo $totalEntradaFisico ?></td>
              <td class="positivo">R$ <?php echo $totalEntradaCartao ?></td>
              <td class="positivo">R$ <?php echo $totalEntradaBanco ?></td>
              <td class="positivo">R$ <?php echo $totalEntrada ?></td>
              <td class="negativo">R$ <?php echo $totalSaidaFisico?></td>
              <td class="negativo">R$ <?php echo $totalSaidaCartao?></td>
              <td class="negativo">R$ <?php echo $totalSaidaBanco?></td>
              <td class="negativo">R$ <?php echo $totalSaida?></td>
              <td class="positivo">R$ <?php echo $totalEntrada + $totalSaida?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
</div>
</body>
</html>
