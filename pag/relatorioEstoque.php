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
<div class="container">
    <!-- CABEÇALHO -->
    <header class="text-center">
      <h1 class="mt-4">Oficina Campinense: Relatório de estoque</h1>
      <p class="lead">Relatório gerado em: DD/MM/AAAA HH:MM</p>
    </header>

    <!-- ESTOQUE -->
    <section id="estoque">
      <h2 class="section-title">Itens do Estoque</h2>
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
            <tr>
              <td>1</td>
              <td>Produto A</td>
              <td>50</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Produto B</td>
              <td>30</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
</div>
</body>
</html>
