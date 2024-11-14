<?php
session_start();



// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php?erro=1');
    echo "Faça Login para continuar";
    exit;
}

// Inicializa o carrinho na sessão se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$carrinho = $_SESSION['carrinho'];
$total = 0;
$subtotal = 0;
$frete = 12;

// Lógica para remover itens do carrinho
if (isset($_POST['remover_item'])) {
    $id_remover = $_POST['remover_item'];
    foreach ($carrinho as $key => $item) {
        if ($item['id'] == $id_remover) {
            unset($carrinho[$key]); // Remove o item
            break; // Sai do loop após remover o item
        }
    }
    $_SESSION['carrinho'] = array_values($carrinho); // Reindexa o array
}


// Verifica se há itens a serem adicionados ao carrinho
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $src = "produtos/" . $id . ".png";

    // Procura se o item já está no carrinho
    $pos = array_search($id, array_column($carrinho, 'id'));

    if ($pos !== false) {
        // Atualiza a quantidade se o item já existir
        $carrinho[$pos]['quantidade'] += $quantidade;
    } else {
        // Adiciona novo item ao carrinho
        $carrinho[] = ['id' => $id, 'img' => $src, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade];
    }

    // Atualiza o carrinho na sessão
    $_SESSION['carrinho'] = $carrinho;

}

// Cálculo do subtotal e total
foreach ($carrinho as $item) {
    $subtotal += $item['preco'] * $item['quantidade'];
}
$total = $subtotal + $frete;

    $_SESSION['subtotal'] = $subtotal;
    $_SESSION['frete'] = $frete;
    $_SESSION['total'] = $total;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mania de Cupcake</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/carrinho.css"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="topo">
        <h1><img src="img/logo-menu.png" alt="logo mania de cupcake" class="logo"></h1>
        <div>
            <h1>Meu carrinho</h1>
            <p>Olá <?= $_SESSION['usuario'] ?></p>
            <a href="sair.php">Sair</a>
        </div>
    </div>
   
    <ul>
 
        <div class="detalhes-pedido">
            
            <?php if (empty($carrinho)): ?>
                <p>Seu carrinho está vazio.</p>
                <br><br>
                <button onclick="window.location.href='pagina-produtos.php'">Ir para Produtos</button>
            <?php else: ?>
                <p>pedido x detalhes</p>
                <?php foreach ($carrinho as $i => $item): ?>
                  
                    <li class="item">
        <div class="imagem-produto">
            <img src="<?= $item['img'] ?>" alt="<?= $item['nome'] ?>">
        </div>
        <div class="detalhes-produto">
            <h4><?= $item['nome'] ?></h4>
            <p class="preco-carrinho">R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>
            <button type="button" class="remover-unidade" onclick="remover(<?= $i ?>)">-</button>
            <input type="number" id="quantidade" class="quantidade-<?= $i ?>" name="quantidade" min="1" max="100" value="<?= $item['quantidade'] ?>" required maxlength="3" onchange="atualizarQuantidade(<?= $item['id'] ?>, this.value)">            
            <button type="button" class="adicionar-unidade" onclick="adicionar(<?= $i ?>)">+</button>
            <form method="post" style="display:inline;">
                <input type="hidden" name="remover_item" value="<?= $item['id'] ?>">
                <button type="submit" class="remover-item"><i class="material-icons">delete</i></button>
            </form>
        </div>
    </li>
<?php endforeach; ?>
            <?php endif; ?>
        </div>

    </ul>
 
    <?php if (!empty($carrinho)): // Verifica se o carrinho não está vazio ?>
        <div class="total">
            <p id="subtotal">subtotal R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
            <p id="desconto">descontos R$: 0,00</p>
            <p id="frete">entrega R$ <?= $frete ?></p>
            <p id="total-compra">total: R$ <?= number_format($total, 2, ',', '.') ?></p>
        </div>
        <div class="finalizar">
            <button type="button" onclick="window.location.href='pagina-produtos.php'">continuar comprando</button>
            <button type="submit"  onclick="window.location.href='confirmar-endereco.php'">finalizar compra</button>
        </div>
    <?php endif; ?>


    <script src="js/atualiza_quantidade.js"></script>
    <!-- <script language="javascript" src="js/total.js"></script> -->


</body>
</html>