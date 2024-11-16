<?php

session_start();


$id = $_SESSION['id_usuario'];

require_once('conexao.php');


// Conectar ao banco de dados
$objDb = new db();
$link = $objDb->conectar();


$stmt = $link->prepare("SELECT * FROM cliente WHERE ID_CLIENTE = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $dados_usuario = $resultado->fetch_assoc(); 
   
    $nome = $dados_usuario['NOME_CLIENTE'];
    $email =  $dados_usuario['EMAIL_CLIENTE'];
    $celular =   $dados_usuario['CELULAR'];
    $cpf_pedaco = substr($dados_usuario['CPF_CLIENTE'], 3, 6);
    $cpf =  str_replace($cpf_pedaco, "******", $dados_usuario['CPF_CLIENTE']);

}

$stmt = $link->prepare("SELECT * FROM endereco WHERE N_CLIENTE = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $dados_usuario = $resultado->fetch_assoc(); 
   
    $cep = $dados_usuario['CEP'];
    $rua =  $dados_usuario['RUA'];
    $bairro =   $dados_usuario['BAIRRO'];
    $cidade = $dados_usuario['CIDADE'];
    $estado =  $dados_usuario['ESTADO'];
    $n_casa =   $dados_usuario['NUMERO_CASA'];
    $complemento =   $dados_usuario['COMPLEMENTO'];
}



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
            <link rel="stylesheet" href="css/meusdados.css"> 
            <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">

    <style>

    </style>

    </head>

    <body>
        <div class="topo">
            <h1><img src="img/logo-menu.png" alt="logo mania de cupcake" class="logo"></h1>

            <div class="">
                
                <h1 class="">Meus dados</h1>
                <p class="">Ola <?= $_SESSION['usuario']?></p>
                <a href="sair.php">Sair</a>
            
            </div>
        </div>

    <div class='conteudo-principal'>
    <div>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <table class='tabela-dados'>
    <th>Dados Pessoais:</th>
    <tr>
       <td><label for="nome">Nome: </label></td>
       <td><input type="text" name="nome" value="<?=$nome?>" readonly></td>
       <!--<td><input type="button" value="Alterar"></td>-->
    </tr>
    <tr>
      <td><label for="email">Email: </label> </td>
      <td><input type="text" name="email" value="<?=$email?>" readonly ></td>
    </tr>
    <tr>
      <td><label for="cel">Celular: </label> </td>
      <td><input type="text" name="cel" value="<?=$celular?>" readonly ></td>
    </tr>
    <tr>
      <td><label for="cpf">CPF: </label></td>
      <td><input type="text" name="cpf" value="<?=$cpf?>" readonly></td>
    </tr>
    </table>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <table class='tabela-dados'>
    <th>Endereço</th>
    <tr>
       <td><label for="nome">CEP: </label></td>
       <td><input type="text" name="cep" value="<?=$cep?>" readonly></td>
    </tr>
    <tr>
      <td><label for="email">Rua: </label> </td>
      <td><input type="text" name="rua" value="<?=$rua?>" readonly ></td>
    </tr>
    <tr>
      <td><label for="cel">Bairro: </label> </td>
      <td><input type="text" name="bairro" value="<?=$bairro?>" readonly ></td>
    </tr>
    <tr>
      <td><label for="cpf">Cidade: </label></td>
      <td><input type="text" name="cidade" value="<?=$cidade?>" readonly></td>
    </tr>
    <tr>
      <td><label for="cpf">Estado: </label></td>
      <td><input type="text" name="estado" value="<?=$estado?>" readonly></td>
    </tr>    <tr>
      <td><label for="cpf">Casa: </label></td>
      <td><input type="text" name="n_casa" value="<?=$n_casa?>" readonly></td>
    </tr>
    <tr>
      <td><label for="cpf">Comlemento: </label></td>
      <td><input type="text" name="complemento" value="<?=$complemento?>" readonly></td>
    </tr>
    </table>

    <br>
        <div class="botao">
        <!--<input type="submit" value="Alterar dados" name="voltar" class="botoes" onclick=""></input>--> 
        <button type="button" onclick="window.location.href='meusdados.php'">voltar</button>
        </div>
        </div>
</form>
</div>
<?php
#inserir novas informações no banco de dados
  /*
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpeza e validação dos dados
     $nome = trim($_POST['nome']);
     $email = trim($_POST['email']);
     $celular = trim($_POST['cel']);
     $cpf = trim($_POST['cpf']);

     $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT); // Usar password_hash 
   $cep = trim($_POST['cep']);
    $rua = trim($_POST['rua']);
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $complemento = trim($_POST['complemento']);
    $estado = trim($_POST['estado']);
    $n_casa = trim($_POST['numero_casa']);

    $objDb = new db();
    $link = $objDb->conectar();
}
        $stmt = $link->prepare("UPDATE cliente SET NOME_CLIENTE = ?, EMAIL_CLIENTE = ?, CELULAR = ?, CPF_CLIENTE = ? WHERE ID_CLIENTE = $id;");
        $stmt->bind_param("ssss", $nome, $email, $celular, $cpf);
        if ($stmt->execute()) {
            alert("Alterado com sucesso");
        }

        buscarDadosCliente ();
*/
?>

    </body>        
</html>


