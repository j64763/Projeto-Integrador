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
      		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
      		<script language="javascript" src="js/mudar-banner.js"></script>
      </head>

		<body>
		<?php include("cabeçalho.php"); ?>
			<p><?echo $produtos;?></p>
			<!--Conteudo principal-->


	
			<div class="produto container lista-produtos">
			<ul>
	<?php
	$conexao = mysqli_connect("127.0.0.1", "site", "etis", "MANIADECUPCAKE");
	$dados = mysqli_query($conexao, "SELECT * FROM produto ORDER BY DATA_CADASTRO DESC LIMIT 0, 3");
	while ($produto = mysqli_fetch_array($dados)):
	?>
	<li>
	<a href="produto.php?id=<?= $produto['ID_PRODUTO'] ?>">
	<figure>
	<img src="produtos/<?= $produto['ID_PRODUTO'] ?>.png"
	alt="<?= $produto['NOME_PRODUTO'] ?>">
	<figcaption><?= $produto['NOME_PRODUTO'] ?></figcaption>
	</figure>
	</a>
	<p><?= $produto['PRECO_PRODUTO']?></p>
	<button>+</button>
	</li>
	<?php endwhile; ?>
	</ul>	

    </div>

<?php include("rodape.php"); ?>
</body>