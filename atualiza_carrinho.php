/*session_start();
print_r($_SESSION);
// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['error' => 'Usuário não está logado']);
    exit;
}


if (isset($_POST['id']) && isset($_POST['quantidade'])) {
    $id = $_POST['id'];
    $quantidade = intval($_POST['quantidade']);

    if ($quantidade < 1) {
        $quantidade = 1; // Garante que a quantidade mínima seja 1
    }

    // Atualiza a quantidade no carrinho
    $carrinho = $_SESSION['carrinho'];
    foreach ($carrinho as &$item) {
        if ($item['id'] == $id) {
            $item['quantidade'] = $quantidade;
            break;
        }
    }
    $_SESSION['carrinho'] = $carrinho;

    // Recalcula subtotal e total
    $subtotal = 0;
    $frete = 12; // Defina o valor do frete
    foreach ($carrinho as $item) {
        $subtotal += $item['preco'] * $item['quantidade'];
    }
    $total = $subtotal + $frete;

    // Retorna os novos valores como JSON
    echo json_encode(['subtotal' => $subtotal, 'total' => $total]);
} else {
    echo json_encode(['error' => 'Dados não enviados']);
}


session_start();

// Verifica se o carrinho está na sessão
if (isset($_SESSION['carrinho']) && isset($_POST['id']) && isset($_POST['quantidade'])) {
    $id = $_POST['id'];
    $nova_quantidade = (int) $_POST['quantidade'];

    // Se a nova quantidade for válida
    if ($nova_quantidade > 0) {
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantidade'] = $nova_quantidade;
                break;
            }
        }
    }

    // Recalcula o subtotal e total
    $subtotal = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $subtotal += $item['preco'] * $item['quantidade'];
    }

    $frete = 12;
    $total = $subtotal + $frete;

    $_SESSION['subtotal'] = $subtotal;
    $_SESSION['total'] = $total;

    // Retorna os novos valores de subtotal e total
    echo json_encode([
        'subtotal' => number_format($subtotal, 2, ',', '.'),
        'total' => number_format($total, 2, ',', '.'),
    ]);
}



*/


<?php   
session_start();

// Verifica se o valor foi enviado
if (isset($_POST['qtde'])) {
    echo $qtde = $_POST['qtde'];
    
    // Armazena o valor em uma variável de sessão (ou qualquer outra lógica necessária)
    $_SESSION['qtde_atualizado'] = $qtde;

    // Retorna uma resposta opcional para o AJAX
    echo "Valor recebido e atualizado: " . htmlspecialchars($qtde);
} else {
    echo "Nenhum valor foi recebido.";
}
?>