function removerUnidade (){
    let qtde = document.getElementById("quantidade");
    let remover = qtde - 1;
    document.getElementById("quantidade").innerHTML(remover);

}

function calculoTotal (){
    let entrada_quantidade = document.getElementById("quantidade")
    let preco_produto = document.getElementById("preco_carrinho")

    let subtotal = entrada_quantidade * preco_produto;
    document.getElementById("subtotal").innerHTML(subtotal);
    
}