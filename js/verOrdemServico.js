//SISTEMA SEARCH AS YOU TYPE ESTOQUE
document.getElementById('pesquisa').addEventListener('keyup', function() {
    let termo = this.value.trim();
    if (termo.length < 2) {
        document.getElementById('resultado').innerHTML = '';
        return;
    }

    fetch('../php/verOrdemServico.php?q=' + encodeURIComponent(termo))
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('resultado').innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                return;
            }

            let html = '<ul class="list-group" style="padding: 1%;">';
            data.forEach(os => {
                html += `
                    <li class="list-group-item">
                        <a href="verOrdemServico.php?nIdentificador=${os.nIdentificador}"><strong>${os.nome}</strong></a><br>
                        <strong>Identificador: </strong>${os.nIdentificador}
                        <a target='_blank' href="../php/gerarRelatorio.php?tipo=ordemServico&nIdentificador=${os.nIdentificador}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/><path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/></svg></a><br>
                    </li>`;
            });
            html += '</ul>';
            document.getElementById('resultado').innerHTML = html;
        })
        .catch(error => console.error('Erro:', error));
});