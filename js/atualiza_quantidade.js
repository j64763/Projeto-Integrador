/*function adicionar(index) {
    let input = document.getElementByClassName('quantidade-' + index);
    input.value = parseInt(input.value) + 1;
    atualizarCarrinho(index, input.value);
}

function remover(index) {
    let input = document.getElementByClassName('quantidade-' + index);
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
        atualizarCarrinho(index, input.value);
    }
}

function atualizarCarrinho(index, quantidade) {
    let formData = new FormData();
    formData.append('id', carrinho[index].id); // Adicione o ID do produto
    formData.append('quantidade', quantidade);

    fetch('seu_script.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Atualize a página ou faça outra ação conforme necessário
        console.log(data);
    });
}*/



function adicionar(index) {
    const inputQuantidade = document.querySelector(`.quantidade-${index}`);
    let quantidade = parseInt(inputQuantidade.value);
    quantidade++;
    inputQuantidade.value = quantidade;
    atualizarSubtotal();
}

function remover(index) {
    const inputQuantidade = document.querySelector(`.quantidade-${index}`);
    let quantidade = parseInt(inputQuantidade.value);
    if (quantidade > 1) {
        quantidade--;
        inputQuantidade.value = quantidade;
    } else {
        // Se a quantidade for 1 e o botão for clicado, você pode optar por remover o item ou deixar a quantidade em 1.
        alert("Quantidade não pode ser menor que 1!");
    }
    atualizarSubtotal();
}

function atualizarSubtotal() {
    let total = 0;
    let subtotal = 0;
    const frete = 12; 
    const itens = document.querySelectorAll('.item');

    itens.forEach(item => {
        const quantidade = parseInt(item.querySelector('input[type="number"]').value);
        const preco = parseFloat(item.querySelector('.preco-carrinho').textContent.replace('R$', '').replace('.', '').replace(',', '.'));
        subtotal += quantidade * preco;
    });

    total = frete + subtotal; // Adiciona o frete ao total

    // Atualiza a exibição do subtotal
    document.getElementById('subtotal').textContent = `subtotal R$ ${subtotal.toFixed(2).replace('.', ',')}`;
    // Atualiza o total final
    document.getElementById('total-compra').textContent = `total: R$ ${total.toFixed(2).replace('.', ',')}`;
}

function atualizarQuantidade(id, quantidade) {
    const xhr = new XMLHttpRequest();
    //xhr.open("POST", "carrinho.php", true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.open("GET", "carrinho.php?q=" + quantidade);
    xhr.send();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                document.getElementById('subtotal').textContent = `subtotal R$ ${response.subtotal.toFixed(2).replace('.', ',')}`;
                document.getElementById('total-compra').textContent = `total: R$ ${response.total.toFixed(2).replace('.', ',')}`;
            } else {
                console.error("Erro ao atualizar a quantidade.");
            }
        }
    };

    //xhr.send(`id=${id}&quantidade=${quantidade}`);
}

