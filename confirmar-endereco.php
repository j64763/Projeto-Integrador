<?php
session_start();
print_r($_SESSION);
$id_usuario = $_SESSION['id_usuario'];
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

// Conexão com o banco de dados
$conexao = mysqli_connect("localhost", "site", "etis", "MANIADECUPCAKE");

// Certifique-se de que a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se os dados do endereço já estão na sessão
if (!isset($_SESSION['endereco_data'])) {

    /*$usuario = $_SESSION['usuario']; // ID do usuário na sessão
    $pesquisa = "SELECT ID_ENDERECO FROM cliente WHERE NOME_CLIENTE = '$usuario'";
    $usuario_id_result = mysqli_query($conexao, $pesquisa);
    echo $usuario_id_result;
    if ($usuario_id_result && mysqli_num_rows($usuario_id_result) > 0) {
        $usuario_id_row = mysqli_fetch_assoc($usuario_id_result);
        $usuario_id = $usuario_id_row['ID_ENDERECO']; // Ajuste conforme necessário
        
        */
        $query = "SELECT CEP, RUA, BAIRRO, CIDADE, COMPLEMENTO, ESTADO FROM endereco WHERE N_CLIENTE = '$id_usuario'";
        
        $resultado = mysqli_query($conexao, $query);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $endereco_data = mysqli_fetch_assoc($resultado);
            $_SESSION['endereco_data'] = $endereco_data; // Armazena dados do endereço na sessão
        } else {
            // Trate o caso em que não há endereço cadastrado
            $_SESSION['endereco_data'] = null;
        }
    }
//}

// Feche a conexão
mysqli_close($conexao);

// Recupera dados do endereço do usuário
$endereco_data = isset($_SESSION['endereco_data']) ? $_SESSION['endereco_data'] : null;



$cep = $endereco_data['CEP'] ?? '';
$rua = $endereco_data['RUA'] ?? '';
$bairro = $endereco_data['BAIRRO'] ?? '';
$cidade = $endereco_data['CIDADE'] ?? '';
$complemento = $endereco_data['COMPLEMENTO'] ?? '';
$estado = $endereco_data['ESTADO'] ?? '';


if (!empty($endereco_data)) {
    // Cria uma string com os dados do endereço
    $endereco_string = htmlspecialchars($cep . ', ' . $rua . ', ' . $bairro . ', ' . $cidade . ' - ' . $estado);
}


$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
$subtotal = isset($_SESSION['subtotal']) ? $_SESSION['subtotal'] : 0;
$frete = isset($_SESSION['frete']) ? $_SESSION['frete'] : 0;
$total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;



?>


<!DOCTYPE html>
	<html lang="pt-br">
		<head>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->
			<title>Mania de Cupcake</title>
			<link rel="icon" type="image/x-icon" href="icons/favicon.ico">
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE-edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="css/style2.css"/>
             
			<!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

		
		</head>


<body>
    <div id="topo">
        <div id="logo"><a href="index.php"><img src="img/logo-menu.png"/></a></div>
        <div id="cabecalho"><h1>Confirmar Compra</h1></div>
    </div>

    <div id="confirmar" class="w3-container ">
            <div id="produtos">
                <ul>
                <h6><b>Itens</b></h6>
                <?php if (empty($carrinho)): ?>
                    <li>Seu carrinho está vazio.</li>
                <?php else: ?>
                    <?php foreach ($carrinho as $item): ?>
                        <li>
                            <img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>" style="width: 100px;"><br><br>
                            <p>Nome: <?= htmlspecialchars($item['nome']) ?></p>
                            <p>Preço: R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>
                            <p>Quantidade: <?= htmlspecialchars($item['quantidade']) ?></p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div id="valores">
            <h6><b>Valores</b></h6>
            <p>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
            <p>Frete: R$ <?= number_format($frete, 2, ',', '.') ?></p>
            <p>Total: R$ <?= number_format($total, 2, ',', '.') ?></p>
                    </div>
                    </div>
        <div id="esquerdo">        
        <div id="endereco">
        <h6><b>Confirme seu Endereço</b></h6>
        <form method="post" action="finalizar.php">
            <label for="endereco">Endereço:</label>
            <input type="radio" id="endereco" name="endereco" class="radio" value="<?=
                $endereco_string;    
            ?>" require>
            <span><?= $endereco_string ?></span>
        </div>
            <br><br>
            <p>Método de Pagamento:</p>    
            <input class="radio" type="radio" name="pagamento" value="Boleto">Boleto
            <input class="radio" type="radio" name="pagamento" value="Pix">Pix
            <input class="radio" type="radio" name="pagamento" value="Cartão">Cartão
            
        </form>
                    
      
        <br><br>
    <div id="opcoes-pagamento"></div>
    </div>
    <button class='botao-confirmar' onclick="window.location.href='carrinho.php'" >Voltar para Carrinho</button>
    
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("input[name='pagamento']").change(function() {
            var metodo = $(this).val();
            $.ajax({
                url: 'processar_pagamento.php', // O script PHP que processará a lógica de pagamento
                type: 'POST',
                data: { pagamento: metodo },
                success: function(data) {
                    $('#opcoes-pagamento').html(data);
                }
            });
        });
    });
</script>
</html>
