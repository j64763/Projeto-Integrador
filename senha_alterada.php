<?php

include ("conexao.php");

$email = $_POST['email'];
$senha = md5($_POST['senha']);


$objDb = new db();
$link = $objDb->conectar();

$email_existe = "SELECT * from cliente where EMAIL_CLIENTE = '$email'";
$consulta = mysqli_query($link,$email_existe);

$resultado = mysqli_fetch_array($consulta);

if ($resultado) {
    $sql = "UPDATE cliente SET SENHA_CLIENTE='$senha' WHERE EMAIL_CLIENTE = '$email'";
    echo 'Senha atualizada com sucesso';
} else {
    echo 'Email não encontrado';

}


?>