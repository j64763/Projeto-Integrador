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

<body class="clear">
	
		<div id="topo">
			<div id="logo" ><a href="index.php"><img src="img/logo5.png" width="150px" height="150px"/></a></div>
			<div id="cabecalho"><h1>Crie uma nova conta</h1>
			Já está registrado? <a href="login.php">Login</a></div>
		</div>

		<div class="row">
			<form id="formulario" action="cadastrar.php" method="post">
				<fieldset class="w3-container w3-left col-md-6" >
				<label for="nome">Nome</label> <br>
				<input type="text" name="nome"  id="nome" required> <br>
				<label for="email">Email</label><br/>
				<input type="email" name="email"  id="email" required></input><br/>
				<label for="cel">Celular:</label><br/>
				<input type="tel" id="cel" name="cel" placeholder="(11) xxxxx-xxxx" pattern="[0-11] ({2}) [0-11] {5} - [0-11] {4} " required><br/>
				<label for="senha">Senha:</label><br/>
				<input type="password" name="password" id="senha" required></input><br/>
				<label for="cpf">CPF</label> <br>
				<input type="text" name="cpf"  id="cpf" required> <br>
				</fieldset>
				
				<!--class="alinhamento" id="esquerda" id="alinhamento-cadastro"-->
				<fieldset class="w3-container w3-left col-md-6" </fieldset>
				<label for="cep">CEP</label> <br>
				<input type="text" name="cep" id="cep" required></input> <br>
				<label for="rua">Rua</label> <br>
				<input type="text" name="rua" id="rua" required></input> <br>
				<label for="bairro">Bairro</label> <br>
				<input type="text" name="bairro" id="bairro" required></input><br>
				<label for="cidade">Cidade</label> <br>
				<input type="text" name="cidade" id="cidade" required></input><br>
				<label for="complemento">Complemento</label> <br>
				<input type="text" name="complemento" id="complemento" required></input><br>
				<label for="estado">Estado</label> <br>
				<select name="estado" id="estado">
				<option>AC</option>
				<option>AL</option>
				<option>AP</option>
				<option>AM</option>
				<option>BA</option>
				<option>CE</option>
				<option>DF</option>
				<option>ES</option>
				<option>MT</option>
				<option>MS</option>
				<option>MG</option>
				<option>PA</option>
				<option>PB</option>
				<option>PR</option>
				<option>PE</option>
				<option>PI</option>
				<option>RJ</option>
				<option>RN</option>
				<option>RS</option>
				<option>RO</option>
				<option>RR</option>
				<option>SC</option>
				<option>SP</option>
				<option>SE</option>
				<option>TO</option>
				</select>
		<br/><br/>

				</fieldset>

				<div class="w3-container w3-center">
					<input type="checkbox" class="checkbox" name="aceitar-promocoes">
					<label for="aceitar-promocoes">Aceito receber promoções por e-mail</label><br/>
					
					<input type="checkbox"  class="checkbox" name="contrato" required>
					<label for="contrato">Concordo com os termos de uso e a política de privacidade</label>
					<br/><br/>
					<input type="button" value="voltar" name="voltar" class="botoes"></input>
					<input type="submit" value="Cadastrar" class="botoes"></input><br/><br/>
				</div>

			
			</form>
		</div>



</body>
</html>