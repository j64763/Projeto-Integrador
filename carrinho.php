<?php
				
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location:login.php?erro=1');
    }
    /*
	$nome_servidor = "localhost";
	$usuario = "site";
	$senha = "etis";
	$nome_banco = "MANIADECUPCAKE";

	$conexão = new mysqli($nome_servidor,$usuario,$senha,$nome_banco);

	if ($conexao->connect_error) {
		die("Erro de conexão");
	}*/
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        	<!--[if lt IE 9]>
	        <script src="js/html5shiv.js"></script>
	        <![endif]-->
            <title>Mania de Cupcake</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE-edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/carrinho.css"> 
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

    </head>

    <body>
        <div class="topo">
            <h1><img src="img/logo-menu.png" alt="logo mania de cupcake" class="logo"></h1>

            <div class="">
                
                <h1 class="">Meu carrinho</h1>
                <p class="">Ola Fulana</p>
                <a href="index.php">Sair</a>
            </div>
        </div>

        
        <div class="detalhes-pedido">
            <p>pedido x detalhes</p>
            <div class="imagem-produto">
            <img src="img/mais-comprados-painel2.png" alt="produto1">
            </div>

            <div class="detalhes-produto">
            <h3>bolo de chocolate com cobertura de merengue</h3>
            <p id="preco-carrinho">R$10,00 UN</p>
            <button type="button" id="remover-unidade" onclick="removerUnidade()">-</button>
            <input type="number" id="quantidade" name="quantidade" min="1" max="100">
            <button type="button" id="adicionar-unidade" onclick="adicionarUnidade()">+</button>
            <button type="button" id="remover-item"><i class="material-icons">delete</i></button>
            </div>
       
        

        <div class="total">
            <p id="subtotal">subtotal R$:10,00</p>
            <p id="desconto">descontos R$:0,00</p>
            <p id="frete">entrega R$12,00</p>
            <p id="total-compra">total R$:22,00</p>
        </div>

        <div class="finalizar">
            <button type="button">continuar comprando</button>
            <button type="submit">finalizar compra</button>
        </div>
    </div>
    <script language="javascript" src="js/total.js"></script>

    </body>
</html>