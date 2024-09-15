<?php

require_once('conexao.php');
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha' ";

$objDb = new db();
$link = $objDb->conectar();

$resultado = mysqli_query($link, $sql); 

if($resultado) {
    $dados_usuario = msqli_fetch_array($resultado);
    if(isset($dados_usuario['usuario'])) {
    }
    else {
        header('Location: index.php?erro=1');
    }
}else {
    echo'Erro na execução da consulta';
}


?>