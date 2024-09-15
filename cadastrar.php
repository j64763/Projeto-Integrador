<?php

require_once('conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['cel'];
$senha = md5($_POST['senha']);
$cpf = $_POST['cpf'];

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$complemento = $_POST['complemento'];
$estado = $_POST['estado'];

$objDb = new db();
$link = $objDb->conectar();

$sql = "INSERT into cliente(NOME_CLIENTE, EMAIL_CLIENTE, CELULAR, SENHA_CLIENTE, CPF_CLIENTE) values ('$nome','$email','$celular' , '$senha', '$cpf')";
$sql = "INSERT into endereco(CEP, RUA, BAIRRO, CIDADE, COMPLEMENTO, ESTADO) values ('$cep', '$rua', '$bairro', '$cidade', '$complemento', '$estado')";
if (mysqli_query($link, $sql)) {
    echo 'Cadastro efetivado com sucesso';
 } else {
        echo'Erro ao cadastrar usuário';
    }

?>