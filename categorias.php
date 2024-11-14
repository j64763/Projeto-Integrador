
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
		
		$id = $_GET['id'];
		$host = '127.0.0.1';
		$user = 'u221154975_site';
		$senha = 'a784T$a1';
		$nome_banco = 'u221154975_MANIADECUPCAKE';

		
		$conn = new mysqli($host, $user, $senha,$nome_banco );

		if ($conn->connect_error) {
			die("Conexão falhou: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM produto WHERE CATEGORIA = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt === false) {
			die("Erro na preparação da consulta: " . $conn->error);
		}
		$stmt->bind_param("i", $id);

		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) 
			// Processa todos os resultados
			while ($produto = $result->fetch_assoc()) :


		 /*while ($produto = mysqli_fetch_array($dados)): 
			$dados
			$produto = mysqli_fetch_array($dados)*/
		?>
	
	

	<form action="carrinho.php" method="post" >
	<li class="produtos">
	<a href="detalhes-produto.php?id=<?= $produto['ID_PRODUTO'] ?>" class="classe_produto">
	<figure>
	<img class="imagem-produtos" src="produtos/<?= $produto['ID_PRODUTO'] ?>.png"
	alt="<?= $produto['NOME_PRODUTO'] ?>"/>
	<figcaption><?= $produto['NOME_PRODUTO'] ?></figcaption>
	</figure>
	</a>
	<p class="preco"><?= $produto['PRECO_PRODUTO']?></p>
	<button class="add_carrinho">+</button>
	<input name="id" type="hidden" value="<?= $produto['ID_PRODUTO'] ?>"/>
	<input name="quantidade" type="hidden" value="1"/>
	<input name="nome" type="hidden" value="<?= $produto['NOME_PRODUTO']?>"/>
	<input name="preco" type="hidden" value="<?= $produto['PRECO_PRODUTO']?>"/>
	</form>
	</li>


	<?php endwhile; ?>
	</ul>	

    </div>

<?php include("rodape.php"); ?>
</body>