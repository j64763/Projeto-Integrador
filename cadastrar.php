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
$n_casa = $_POST['numero_casa'];


$objDb = new db();
$link = $objDb->conectar();

$usuario_existe = "SELECT * from cliente where NOME_CLIENTE = '$nome'";
$consulta = mysqli_query($link,$usuario_existe);

$resultado = mysqli_fetch_array($consulta);

if ($resultado) {
    echo "usuario ja existe";
    var_dump($resultado);
} else {

    $sql = "INSERT into cliente(ID_CLIENTE, NOME_CLIENTE, EMAIL_CLIENTE, CELULAR, SENHA_CLIENTE, CPF_CLIENTE) values (null,'$nome','$email','$celular' , '$senha', '$cpf')";

if (mysqli_query($link, $sql)) {
    $ultimo_id = mysqli_insert_id($link);
    echo 'Cadastro de cliente efetivado com sucesso. Último id: ' . $ultimo_id;
 } else {
        echo'Erro ao cadastrar usuário';
    }


$nova_consulta = "INSERT into endereco( CEP, RUA, BAIRRO, CIDADE, ESTADO, NUMERO_CASA, COMPLEMENTO, N_CLIENTE, ID_ENDERECO) values ('$cep', '$rua', '$bairro', '$cidade', '$estado', '$n_casa', '$complemento','$ultimo_id', null)";

if (mysqli_query($link, $nova_consulta)) {
    $ultimo_id_endereco = mysqli_insert_id($link);
    echo 'Cadastro de endereço realizado com sucesso Último id: ' . $ultimo_id_endereco;
} else {
       echo'Erro ao cadastrar endereco';
   }


   $atualizar_id_cliente = "UPDATE cliente SET ID_ENDERECO='$ultimo_id_endereco' WHERE ID_CLIENTE='$ultimo_id'";

   if (mysqli_query($link, $atualizar_id_cliente)) {
       
       echo 'ID atualizado';
   } else {
          echo'Erro ao atualizar ID';
      }
   
}




?>