
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php
session_start();

require_once('conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];


    // Conectar ao banco de dados
    $objDb = new db();
    $link = $objDb->conectar();

    // Usar prepared statement para evitar SQL Injection
    $stmt = $link->prepare("SELECT * FROM cliente WHERE EMAIL_CLIENTE = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $dados_usuario = $resultado->fetch_assoc();

        // Verificar a senha
        if (password_verify($senha, $dados_usuario["SENHA_CLIENTE"])) {
            $_SESSION['id_usuario'] = $dados_usuario["ID_CLIENTE"];
            $_SESSION['usuario'] = $dados_usuario["NOME_CLIENTE"];
            header('Location: meusdados.php');
            exit(); // Adicione exit após o redirecionamento
        } elseif ($senha == "") {
            // Senha em branco
            header('Location: login.php?erro=2'); // Pode usar erro=2 para senha em branco
            exit();
        } else {
            header('Location: login.php?erro=1');
            exit();
        }
    } else {
        // Email não encontrado
        header('Location: login.php?erro=1'); // Pode usar erro=1 para email não encontrado
        exit();
    }

    // Fechar o statement
    $stmt->close();
} else {
    echo 'Método de requisição inválido.';
}

// Fechar a conexão
$link->close();
?>

</body>
</html>
