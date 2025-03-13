//SISTEMA SEARCH AS YOU TYPE ESTOQUE
document.getElementById('pesquisa').addEventListener('keyup', function() {
    let termo = this.value.trim();
    if (termo.length < 2) {
        document.getElementById('resultado').innerHTML = '';
        return;
    }

    fetch('../php/verEstoque.php?q=' + encodeURIComponent(termo))
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('resultado').innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                return;
            }

            let html = '<ul class="list-group" style="padding: 1%;">';
            data.forEach(produto => {
                html += `
                    <li class="list-group-item">
                        <a href="verEstoque.php?nome=${produto.nome}"><strong>${produto.nome}</strong></a><br>

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/></svg>${produto.quantidade}
                    </li>`;
            });
            html += '</ul>';
            document.getElementById('resultado').innerHTML = html;
        })
        .catch(error => console.error('Erro:', error));
});