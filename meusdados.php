
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        	<!--[if lt IE 9]>
	        <script src="js/html5shiv.js"></script>
	        <![endif]-->
            <title>Mania de Cupcake</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE-edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/carrinho.css"> 
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

    </head>

    <body>
        <div class="topo">
            <h1><img src="img/logo-menu.png" alt="logo mania de cupcake" class="logo"></h1>

            <div class="">
                
                <h1 class="">Meu perfil</h1>
                <p class="">Ola <?= $_SESSION['usuario']?></p>
                <a href="sair.php">Sair</a>
            
            </div>
        </div>
        <table>
        <tr style="border-style: solid;">
            <td><a href="#">Meus Dados</a></td>
        </tr>
        <tr>
          <td><a href="#">Meus Pedidos</a></td>
        </tr>
        <tr>
          <td><a href="#">Métodos de Pagamento</a></td>
        </tr>
        <tr>
          <td><a href="#">SAC</a></td>
        </tr>
        </table>

        <br>
        <input type="button" value="Ir para o carrinho" name="voltar" class="botoes" onclick="window.location.href='carrinho.php'"></input> 
</body>        
</html>