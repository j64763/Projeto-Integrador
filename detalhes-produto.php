

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
			 <script src="js/jquery.js"></script>
			
			<script>
			$(document).ready(function() {
				$('#comprar').click(function() {
					
				})
			});
			</script>
      
	</head>

		<body>
		<?php include("cabeçalho.php"); ?>
		
<!--Conteudo-->
<div class="conteudo container">
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

		$sql = "SELECT * FROM produto WHERE ID_PRODUTO = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt === false) {
			die("Erro na preparação da consulta: " . $conn->error);
		}
		$stmt->bind_param("i", $id);

		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) 
			// Processa todos os resultados
			while ($row = $result->fetch_assoc()) :


		 /*while ($produto = mysqli_fetch_array($dados)): 
			$dados
			$produto = mysqli_fetch_array($dados)*/

			$src = "produtos-detalhes/".$row['ID_PRODUTO'].".png";

			$nome = $row['NOME_PRODUTO'];

			$preco = $row['PRECO_PRODUTO'];

			$id = $row['ID_PRODUTO'];

			



		?>
<form action="carrinho.php" method="post">
<section class="imagem">

<img name="imagem-produto" src="<?= $src ?>" alt="<?= $nome?>">

</section>

<section class="detalhes">
	<h3 name="nome"><?= $nome?></h3>
	<p id="descricao">
	<?= $row['DESCRICAO']?>
	</p>
	<?php
		if ($row['PROMOCAO'] == 1) {
			echo "<del style='color:red;'><p id='preco' name='preco'>R$ $preco </p></del>";
			$preco = $row['PRECO_PROMOCIONAL'];

			
		}
	?>
	<p id="preco" name="preco">R$ <?= $preco?></p>
	<form >
		<button type="button" id="remover-unidade" onclick="function remover()">-</button>
		<input type="number" id="quantidade" name="quantidade" value="1"  min="1" max="100">
		<button type="button" id="adicionar-unidade">+</button>
		<button type="submit" id="comprar">COMPRAR</button>
		<input name="id" type="hidden" value="<?= $id ?>"/>
		<input name="nome" type="hidden" value="<?= $nome ?>"/>
		<input name="preco" type="hidden" value="<?= $preco ?>"/>
		
	</form>
	<p id="ingredientes">
	<?= $row['COMPOSICAO_PRODUTO']?>
	</p>

	<?php
		
endwhile;

?>
</section>
</form>

	<?php 

$sql = "SELECT * FROM tabela_nutricional WHERE ID_PRODUTO = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt === false) {
			die("Erro na preparação da consulta: " . $conn->error);
		}
		$stmt->bind_param("i", $id);

		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows > 0) 
			// Processa todos os resultados
			while ($linha = $result->fetch_assoc()) :


?>
	<table>
		<tr>
		 <th colspan="4">Tabela Nutricional (1UN)</th>
		</tr>
		<tr>
		 <td>Valor Energético</td>
		 <td><?= $linha['CALORIAS']?></td>
		 <td>Fibras Alimentares</td>
		 <td><?= $linha['FIBRAS']?></td>
		</tr>
		<tr>
		 <td>Gorduras Totais</td>
		 <td><?= $linha['GORDURAS_TOTAIS']?></td>
		 <td>Açúcares Totais</td>
		 <td><?= $linha['AÇUCARES']?></td>
		</tr>
		<tr>
		 <td>Gorduras Saturadas</td>
		 <td><?= $linha['GORDURAS_SATURADAS']?></td>
		 <td>Proteínas</td>
		 <td><?= $linha['PROTEINAS']?></td>
		</tr>
		<tr>
		 <td>Gorduras Trans</td>
		 <td><?= $linha['GORDURAS_TRANS']?></td>
		 <td>Cálcio</td>
		 <td><?= $linha['CALCIO']?></td>
		</tr>
		<tr>
		 <td>Colesterol</td>
		 <td><?= $linha['COLESTEROL']?></td>
		 <td>Ferro</td>
		 <td><?= $linha['FERRO']?></td>
		</tr>
		<tr>
		 <td>Sódio</td>
		 <td><?= $linha['SODIO']?></td>
		 <td>Potássio</td>
		 <td><?= $linha['POTASSIO']?></td>
		</tr>
		<tr>
		 <td>Carboidratos</td>
		 <td><?= $linha['CARBOIDRATOS']?></td>
		</tr>
	
	</table>




<?php
endwhile;
// Fecha a declaração e a conexão
		$stmt->close();
		$conn->close();  
?>
</div>
<script src="js/meu-jquery.js"></script>
<?php include("rodape.php"); ?>
</body>