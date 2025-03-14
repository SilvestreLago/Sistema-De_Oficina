//SISTEMA SEARCH AS YOU TYPE ESTOQUE
document.getElementById('pesquisa').addEventListener('keyup', function() {
    let termo = this.value.trim();
    if (termo.length < 2) {
        document.getElementById('resultado').innerHTML = '';
        return;
    }

    fetch('../php/verOrcamento.php?q=' + encodeURIComponent(termo))
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('resultado').innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                return;
            }

            let html = '<ul class="list-group" style="padding: 1%;">';
            data.forEach(orcamento => {
                html += `
                    <li class="list-group-item">
                        <a href="verOrcamento.php?nIdentificador=${orcamento.nIdentificador}"><strong>${orcamento.nome}</strong></a><br>
                        <strong>Identificador: </strong>${orcamento.nIdentificador}<br>
                    </li>`;
            });
            html += '</ul>';
            document.getElementById('resultado').innerHTML = html;
        })
        .catch(error => console.error('Erro:', error));
});