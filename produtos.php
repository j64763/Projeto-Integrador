<?php
$conexao = mysqli_connect("127.0.0.1","u221154975_site",'a784T$a1',"u221154975_MANIADECUPCAKE");
$dados = mysqli_query($conexao,"SELECT * FROM produtos");
$produto = mysqli_fetch_array($dados);

?>