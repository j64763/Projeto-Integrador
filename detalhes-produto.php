<?php
				
	$nome_servidor = "localhost";
	$usuario = "site";
	$senha = "etis";
	$nome_banco = "MANIADECUPCAKE";

	$conexão = new msqli($nome_servidor,$usuario,$senha,$nome_banco);

	if ($conexao->connect_error) {
		die("Erro de conexão");
	}
				/*$conexao = mysqli_connect("127.0.0.1", "site", "etis", "MANIADECUPCAKE");
				$dados = mysqli_query($conexao, "SELECT * FROM produto"); // WHERE id = $_GET[id]
				echo $dados;
				$produtos = mysqli_fetch_array($dados);*/
				

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
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
      		<link rel="stylesheet" href="css/reset.css">
			<link rel="stylesheet" href="css/menu.css">
			<link rel="stylesheet" href="css/detalhes-produto.css">
      		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
      		<script language="javascript" src="js/mudar-banner.js"></script>
      </head>

		<body>
		<?php include("cabeçalho.php"); ?>


<!--Conteudo-->
<div class="conteudo container">


    <section class="imagem">

        <img src="img/mais-comprados-painel2.png" alt="produto1">

    </section>

    <section class="detalhes">
        <h3><?= $produtos['NOME_PRODUTO']?></h3>
        <p id="descricao">
		<?= $produtos['DESCRICAO']?>
        </p>
        <p id="preco"><?= $produtos['preco']?></p>
        <form >
            <button type="button" id="remover-unidade">-</button>
            <input type="number" id="quantidade" name="quantidade" min="1" max="100">
            <button type="button" id="adicionar-unidade">+</button>
            <button type="button" id="comprar">COMPRAR</button>
        </form>
        <p>
            ingredientes da massa:  farinha de trigo, açúcar, manteiga, leite, fermento em pó, cacau em pó, ovos.
        </p>
        <table>
            <tr>
             <th colspan="3">Tabela Nutricional (1UN)</th>
            </tr>
            <tr>
             <td>Valor Energético</td>
             <td>500Kcal</td>
            </tr>
            <tr>
             <td>Gorduras Saturadas</td>
            </tr>
        </table>
    </section>

</div>


            <footer>
				<a href="menu.html"><img src="img/logo-rodape.png" id="logo-rodape"/></a>
				<div>
				  
				  <ul class="links">
					<li>
					  <a href="#" target="_blank">Institucional</a>
					</li>
					<li>
					  <a href="historia.html" target="_blank">quem somos</a>
					</li>
					<li>
					  <a href="#" target="_blank">política de privacidade</a>
					</li>
					<li>
					  <a href="historia.html#endereços" target="_blank">nossas lojas</a>
					</li>
				  </ul>
				  
				  <ul class="social">
				  <li>
					<a href="http://facebook.com" target="_blank">
					  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
					</a>
				  </li>
				  <li>
					<a href="http://x.com" target="_blank">
					  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>				</a>
				  </li>
				  <li>
					<a href="http://instagram.com" target="_blank">
					  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
					</a>
				  </li>
				</ul>
				<p>
				  Mania de cupcake - cnpj 5656565656560001<br>
				  rua x, bairro y, cidade b<br>
				  horário de funcionamento:  segunda a sexta das 09 às 18<br>
				  sábados das 09:00 às 12:00
				</p>
			   </div>
			  </footer>
			</body>