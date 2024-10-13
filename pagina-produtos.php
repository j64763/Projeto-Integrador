<!--	
	$nome_servidor = "localhost";
	$usuario = "site";
	$senha = "etis";
	$nome_banco = "MANIADECUPCAKE";

	$conexão = new mysqli($nome_servidor,$usuario,$senha,$nome_banco);

	if ($conexao->connect_error) {
		die("Erro de conexão");
	}

	$sql = "SELECT * FROM produto WHERE id = $_GET[id]";
				$conexao = mysqli_connect("127.0.0.1", "site", "etis", "MANIADECUPCAKE");
				$dados = mysqli_query($conexao, "SELECT * FROM produto"); // WHERE id = $_GET[id]
				echo $dados;
				$produtos = mysqli_fetch_array($dados);
				
-->

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
			<link rel="stylesheet" href="css/style-produtos.css">
			<script src="js/jquery.js"></script>
      		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
			<script>
			$(document).ready(function(){
				$("add_carrinho").click(function(){
				$("#sacola .material-icons").css("color","white").toggle()
				});
			
			
			
			
			});


			</script>

		
		</head>

		<body>
		<?php include("cabeçalho.php"); ?>
			<!--Conteudo principal-->


	
			<div class="produto container lista-produtos">
			<ul>
	<?php
	$conexao = mysqli_connect("127.0.0.1", "site", "etis", "MANIADECUPCAKE");
	$dados = mysqli_query($conexao, "SELECT * FROM produto");
	while ($produto = mysqli_fetch_array($dados)):

	?>
	
	<li class="produtos">
	<a href="detalhes-produto.php?id=<?= $produto['ID_PRODUTO'] ?>" class="classe_produto">
	<figure>
	<img src="produtos/<?= $produto['ID_PRODUTO'] ?>.png"
	alt="<?= $produto['NOME_PRODUTO'] ?>">
	<figcaption><?= $produto['NOME_PRODUTO'] ?></figcaption>
	</figure>
	</a>
	<p class="preco"><?= $produto['PRECO_PRODUTO']?></p>
	<button name="add_carrinho" class="add_carrinho">+</button>
	</li>
	
	<?php endwhile; ?>
	</ul>	
	
	<!--		
			<ul>
				<li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="img/mais-comprados-painel2.png" alt="imagem-mais-comprados">
						<figcaption><?= $produtos['NOME_PRODUTO']?></figcaption>
					</figure>
                    </a>

                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/1chocolate.png" alt="imagem-mais-comprados">
                        <figcaption><?= $produtos['NOME_PRODUTO']?></figcaption>
					</figure>
                    </a>
					<p>//<?= $produtos['PRECO_PRODUTO']?></p>
					<button>+</button>
                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/2data.png" alt="imagem-mais-comprados">
                        <figcaption>Mais comprados</figcaption>
					</figure>
                    </a>
					<p>R$ 10,00</p>
					<button>+</button>
                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/3chocolate.png" alt="imagem-mais-comprados">
						<figcaption>Mais comprados</figcaption>
					</figure>
                    </a>
					<p>R$ 10,00</p>
					<button>+</button>
                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/4redvelvet.png" alt="imagem-mais-comprados">
                        <figcaption>Mais comprados</figcaption>
					</figure>
                    </a>
					<p>R$ 10,00</p>
					<button>+</button>
                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/11comemorativa.png" alt="imagem-mais-comprados">
                        <figcaption>Mais comprados</figcaption>
					</figure>
                    </a>
					<p>R$ 10,00</p>
					<button>+</button>
                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/12salgado.png" alt="imagem-mais-comprados">
                        <figcaption>Mais comprados</figcaption>
					</figure>
                    </a>
					<p>R$ 10,00</p>
					<button>+</button>
                  </li>

				  <li>
                    <a href="detalhes-produto.html" alt="categoria2">
                      <figure>
                        <img src="produtos/13simples.png" alt="imagem-mais-comprados">
                        <figcaption>Mais comprados</figcaption>
					</figure>
                    </a>
					<p>R$ 10,00</p>
					<button>+</button>
                  </li>

				</ul>
	-->

			</div>













			<?php include("rodape.php"); ?>
			</body>