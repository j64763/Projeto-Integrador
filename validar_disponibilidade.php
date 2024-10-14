<html>
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
<?php

$cep =  $_GET['cep'];



if (!strncasecmp($cep, "0",1)) {
    header('Location: cadastro.php');
}
else {
    echo "Que pena. Infelizmente não atendemos para o seu endereço. Que tal visitar uma de nossas lojas?    ";
    
}

?>

</br></br>
        <input type="button" value="Locais" name="voltar" class="botoes" onclick="window.location.href='historia.php'"></input> 

