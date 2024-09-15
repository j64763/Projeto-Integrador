<?php
$conexao = mysqli_connect("127.0.0.1","site","etis","MANIADECUPCAKE");
$dados = mysqli_query($conexao,"SELECT * FROM produtos");
$produto = mysqli_fetch_array($dados);

?>