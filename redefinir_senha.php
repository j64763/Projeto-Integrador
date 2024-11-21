<?php
require_once('conexao.php');

$objDb = new db();
$link = $objDb->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtém o token da URL
    $token = $_GET['token'] ?? null;

    if (!$token) {
        die("Token inválido. Por favor, tente novamente.");
    }

    // Verifica se o token é válido e não expirou
    $stmt = $link->prepare("SELECT TOKEN_EXPIRES, ID_CLIENTE FROM cliente WHERE TOKEN_REDEFINICAO = ?");
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $link->error);
    }

    $stmt->bind_param("s", $token);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $data_expira = $usuario['TOKEN_EXPIRES'];
        $data_atual = date('Y-m-d H:i:s');
        $id = $usuario['ID_CLIENTE'];



        if ($data_expira < $data_atual) {
            echo 'Link Expirado <br> Voltar para o site: <a href="firebrick-mosquito-536476.hostingersite.com
">Mania de Cupcake</a>';
            exit;
        }
    } else {
        echo 'Token inválido ou não encontrado.';
        exit;
    }

    // Se o token for válido, exibe o formulário
    echo <<<HTML
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mania de Cupcake - Redefinir Senha</title>
    <link rel="icon" type="image/x-icon" href="icons/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div id="topo">
        <div id="logo"><a href="index.php"><img src="img/logo5.png" width="150px" height="150px"/></a></div>
        <div id="cabecalho"><h1>Redefinir Senha</h1>
        Digite sua nova senha</div>
    </div>

    <div id="formulario" class="w3-container w3-center">
        <form action="" method="post">
            <label for="senha">Nova Senha</label><br>
            <input type="password" id="senha" name="senha" required><br><br>
            <input type="submit" value="Enviar" class="botoes">
            <input name="id" type="hidden" value="$id"/>
        </form>
    </div>
</body>
</html>
HTML;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe a nova senha do formulário


    $senha = $_POST['senha'] ?? null;
    $id = $_POST['id'];


    if (!$senha || strlen($senha) < 8) {
        die("Senha inválida. Certifique-se de que possui pelo menos 8 caracteres.");
    }

    // Criptografa a nova senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    #echo '<br>' . $senha_hash . '<br>';
    // Atualiza a senha no banco de dados
    $stmt = $link->prepare("UPDATE cliente SET SENHA_CLIENTE = ?, TOKEN_REDEFINICAO = NULL, TOKEN_EXPIRES = NULL WHERE ID_CLIENTE = ?");
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $link->error);
    }

    $stmt->bind_param("ss", $senha_hash, $id);

    if ($stmt->execute()) {
        echo "Senha alterada com sucesso. <a href='login.php'>Clique aqui para efetuar login.</a>";
    } else {
        echo "Erro ao atualizar a senha. Tente novamente mais tarde.";
    }
}
?>

