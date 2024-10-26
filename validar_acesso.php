
<html>

<body>
<?php

session_start();

require_once('conexao.php');
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM cliente WHERE EMAIL_CLIENTE = '$email' AND SENHA_CLIENTE = '$senha' ";

$objDb = new db();
$link = $objDb->conectar();

$resultado = mysqli_query($link, $sql); 




 if($resultado) {
    
$dados_usuario = mysqli_fetch_array($resultado);


   if(isset($dados_usuario["EMAIL_CLIENTE"])) {
        $_SESSION['usuario'] = $dados_usuario["NOME_CLIENTE"];

        header('Location: meusdados.php');
    }
    else {
        header('Location: login.php?erro=1');
    }
}
else {
    echo'Erro na execução da consulta';
}


?>

</html>

</body>