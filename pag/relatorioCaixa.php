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
        <h1 class="mt-4">Oficina Campinense: Relatório de caixa</h1>
        <p class="lead">Relatório gerado em: DD/MM/AAAA HH:MM</p>
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
            <tr>
              <td>101</td>
              <td>01/04/2025</td>
              <td class="positivo">R$ 1.000,00</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>102</td>
              <td>05/04/2025</td>
              <td class="positivo">R$ 500,00</td>
              <td>Admin</td>
            </tr>
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
            <tr>
              <td>101</td>
              <td>01/04/2025</td>
              <td class="positivo">R$ 1.000,00</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>102</td>
              <td>05/04/2025</td>
              <td class="positivo">R$ 500,00</td>
              <td>Admin</td>
            </tr>
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
            <tr>
              <td>101</td>
              <td>01/04/2025</td>
              <td class="positivo">R$ 1.000,00</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>102</td>
              <td>05/04/2025</td>
              <td class="positivo">R$ 500,00</td>
              <td>Admin</td>
            </tr>
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
            <tr>
              <td>201</td>
              <td>02/04/2025</td>
              <td class="negativo">R$ 700,00</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>202</td>
              <td>06/04/2025</td>
              <td class="negativo">R$ 500,00</td>
              <td>Admin</td>
            </tr>
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
            <tr>
              <td>201</td>
              <td>02/04/2025</td>
              <td class="negativo">R$ 700,00</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>202</td>
              <td>06/04/2025</td>
              <td class="negativo">R$ 500,00</td>
              <td>Admin</td>
            </tr>
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
            <tr>
              <td>201</td>
              <td>02/04/2025</td>
              <td class="negativo">R$ 700,00</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>202</td>
              <td>06/04/2025</td>
              <td class="negativo">R$ 500,00</td>
              <td>Admin</td>
            </tr>
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
              <td class="positivo">R$ 300,00</td>
              <td class="positivo">R$ 500,00</td>
              <td class="positivo">R$ 600,00</td>
              <td class="positivo">R$ 1400,00</td>
              <td class="negativo">R$ 100,00</td>
              <td class="negativo">R$ 200,00</td>
              <td class="negativo">R$ 100,00</td>
              <td class="negativo">R$ 400,00</td>
              <td class="positivo">R$ 1000,00</td>
            </tr>
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
              <th>Ordens de Serviço</th>
              <th>Orçamentos</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>20</td>
              <td>20</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
</div>
</body>
</html>
