
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexao.php'; // Inclua sua conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Validação do formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Endereço de e-mail inválido.";
        exit;
    }

    $objDb = new db();
    $link = $objDb->conectar();

    // Verifica se o e-mail existe no banco de dados
    $stmt = $link->prepare("SELECT * FROM cliente WHERE EMAIL_CLIENTE = ?");
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $link->error);
    }

    
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("Erro ao executar a consulta: " . $stmt->error);
    }
    
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Gera um token único e uma data de expiração
        $token = bin2hex(random_bytes(16));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Armazena o token e a expiração no banco de dados
        $stmt = $link->prepare("UPDATE cliente SET TOKEN_REDEFINICAO = ?, TOKEN_EXPIRES = ? WHERE ID_CLIENTE = ?");
        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        $stmt->bind_param("ssi", $token, $expira, $usuario['ID_CLIENTE']);
        if (!$stmt->execute()) {
            die("Erro ao executar a consulta: " . $stmt->error);
        }

        // Envia o e-mail
        $link_redefinicao = "http://maniadecupake.com/redefinir_senha.php?token=" . $token;
        $assunto = "Recuperação de Senha";
        $mensagem = "Clique no link para redefinir sua senha: " . $link_redefinicao;

        // Enviar e-mail usando uma biblioteca apropriada ou método mais robusto
        if (mail($email, $assunto, $mensagem)) {
            echo "Um e-mail foi enviado para você com instruções para redefinir sua senha.";
        } else {
            echo "Falha ao enviar o e-mail.";
        }
    } else {
        echo "E-mail não encontrado.";
    }
}
?>
