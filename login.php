<?php

session_start();

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

if (isset($_SESSION['usuario'])) {
    header('Location: meusdados.php'); // Redireciona se já estiver logado
    exit();
}



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
	<div id="cabecalho"><h1>Login</h1>
		Faça login para continuar</div>
	</div>
	

	<div class="w3-container w3-center">
	<form id="formulario" action="validar_acesso.php" method="post">
		
		<label for="email">E-mail:</label><br/>
		<input type="email" id="email" placeholder="email@gmail.com" name="email"></input><br/><br/>
		<label>Senha:</label><br/>
		<input type="password" name="senha"></input><br/><br/>
		
		<?php
			if($erro == 1) {
				echo '<font color="#FF0000">Usuário e/ou senha inválidos</font><br><br/>';
			}
			if($erro == 2) {
				echo '<font color="#FF0000">Insira uma senha antes de continuar</font><br><br/>';
			}
		?>

		<a href="recuperar-senha.php">Esqueci a senha</a>
		<br/>
		<br/>


		<input type="submit" value="Login" name="entrar" class="botoes"></input>
		<input type="button" value="voltar" name="voltar" class="botoes" id="voltar"  onclick="window.location.href='index.php'" ></input><br/><br/>
		Não possui conta?<a href="disponibilidade.php"> Cadastrar</a><br/><br/>
		
	</form>
</div>
<script src="js/script.js"></script>
</body>
</html>