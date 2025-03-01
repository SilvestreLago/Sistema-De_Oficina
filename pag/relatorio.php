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
      <h1 class="mt-4">Relatório Do Sistema</h1>
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

    <!-- ENTRADAS FINANCEIRAS -->
    <section id="entradas">
      <h2 class="section-title">Entradas Financeiras</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>101</td>
              <td>01/04/2025</td>
              <td class="positivo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
                R$ 1.000,00
              </td>
            </tr>
            <tr>
              <td>102</td>
              <td>05/04/2025</td>
              <td class="positivo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
                R$ 500,00
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- SAÍDAS FINANCEIRAS -->
    <section id="saidas">
      <h2 class="section-title">Saídas Financeiras</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Data</th>
              <th>Valor (R$)</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>201</td>
              <td>02/04/2025</td>
              <td class="negativo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                R$ 700,00
              </td>
            </tr>
            <tr>
              <td>202</td>
              <td>06/04/2025</td>
              <td class="negativo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                R$ 500,00
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- RESUMO -->
    <section id="ordens-servico">
      <h2 class="section-title">Resumo</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>O.S</th>
              <th>Orçamentos</th>
              <th>Entrada total</th>
              <th>Saída total</th>
              <th>Saldo total</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>20</td>
              <td>20</td>
              <td class="positivo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
                R$ 1500,00
              </td>
              <td class="negativo"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                R$ 1200,00
              </td>
              <td class="positivo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/></svg>
                R$ 300,00
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
</div>
</body>
</html>
