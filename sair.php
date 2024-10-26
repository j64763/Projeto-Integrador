<?php

session_start();

unset($_SESSION['usuario']);


?>

<html>

<head>
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
	<div id="cabecalho"><h1>Logout</h1>
		Até breve</div>
	</div>
	

<br><br>
<input type="button" value="voltar" name="voltar" class="botoes" onclick="window.location.href='index.php'"></input>
<script src="js/script.js"></script>
</body>

</html>