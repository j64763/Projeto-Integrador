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
	<div id="logo"><a href="index.php"><img src="img/logo5.png" width="150px" height="150px"/></a></div>
	<div id="cabecalho"><h1>Verificar disponilibilidade</h1>
		Insira seu CEP para verificar a disponibilidade</div>
	</div>

	<div  class="w3-container w3-center">
	<form id="disponibilidade" action="validar_disponibilidade.php" method="get" >
	<br/><br/><br/><br/>
		<!--<label for="email">E-mail:</label><br/>
		<input type="email" name="email" id="email" placeholder="email@gmail.com"></input><br/><br/>-->
		<label>CEP:</label><br/>
		<input type="text" name="cep" required maxlength="9"></input><br/><br/>
		
		<input type="submit" value="conferir" name="conferir" class="botoes"></input>
		<input type="button" value="voltar" name="voltar" class="botoes" id="voltar"></input><br/><br/>
	</form>
</div>
<script src="js/script.js"></script>
</body>
</html>