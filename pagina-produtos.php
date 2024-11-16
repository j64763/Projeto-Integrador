
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
            $(".add_carrinho").click(function(event){
                //event.preventDefault();  Impede o envio do formulário
                
                // Muda a cor do ícone do carrinho
                let icon = $("#sacola .material-icons");
                icon.text("add_shopping_cart");
				icon.css("color", "white"); // Exemplo de mudança de cor
				icon.addClass("scale-icon"); 

                // Retorna ao estado original após 2 segundos
                setTimeout(function(){
					icon.text("shopping_cart");
					icon.css("color", "gray"); // Restaura a cor original
					icon.removeClass("scale-icon");
                }, 1000);
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
	$conexao = mysqli_connect("127.0.0.1", "u221154975_site", 'a784T$a1', "u221154975_MANIADECUPCAKE");
	$dados = mysqli_query($conexao, "SELECT * FROM produto");

			if (isset($_POST['pesquisa'])) {
				$dados = mysqli_query($conexao, "SELECT * FROM produto where NOME_PRODUTO like '%".$_POST['pesquisa']."%'");
			}

	while ($produto = mysqli_fetch_array($dados)):

		$preco = $produto['PRECO_PRODUTO'];

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

		
	<p class="preco"><?php 
	if ($produto['PROMOCAO'] == 1) {
		$preco = $produto['PRECO_PROMOCIONAL'];
		$preco_antigo = $produto['PRECO_PRODUTO'];
		echo "<del style='color:red;'>$preco_antigo</del>  $preco";
	}else {
		echo "$preco";
	}

	?>
	
</p>

	
	<button class="add_carrinho" type="submit">+</button>
	<input name="id" type="hidden" value="<?= $produto['ID_PRODUTO'] ?>"/>
	<input name="quantidade" type="hidden" value="1"/>
	<input name="nome" type="hidden" value="<?= $produto['NOME_PRODUTO']?>"/>
	<input name="preco" type="hidden" value="<?= $preco ?>"/>
	</li>
	</form>
	
	
	<?php endwhile; ?>
	</ul>	


			</div>

			<?php include("rodape.php"); ?>
			</body>