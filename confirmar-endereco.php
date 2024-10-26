<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php?erro=1');
    exit;
}

// Se o carrinho estiver vazio, redireciona para a página de produtos
if (empty($_SESSION['carrinho'])) {
    header('Location: pagina-produtos.php');
    exit;
}

// Recupera dados do endereço do usuário
$endereco = isset($_SESSION['endereco']) ? $_SESSION['endereco'] : '';
$cidade = isset($_SESSION['cidade']) ? $_SESSION['cidade'] : '';
$estado = isset($_SESSION['estado']) ? $_SESSION['estado'] : '';
$cep = isset($_SESSION['cep']) ? $_SESSION['cep'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Confirmar Endereço</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estilos.css"> 
</head>
<body>
    <div class="container">
        <h1>Confirme seu Endereço</h1>
        <form method="post" action="processar_compra.php">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($endereco) ?>" readonly>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($cidade) ?>" readonly>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="<?= htmlspecialchars($estado) ?>" readonly>

            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="<?= htmlspecialchars($cep) ?>" readonly>

            <button type="submit">Confirmar Endereço</button>
        </form>
        <button onclick="window.location.href='pagina-produtos.php'">Voltar para Produtos</button>
    </div>
</body>
</html>
