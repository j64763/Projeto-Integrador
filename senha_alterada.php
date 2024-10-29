<?php
require 'db.php'; // Inclua sua conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verifica se o e-mail existe no banco de dados
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Gera um token único e uma data de expiração
        $token = bin2hex(random_bytes(16));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Armazena o token e a expiração no banco de dados
        $stmt = $conexao->prepare("UPDATE usuarios SET token_redefinicao = ?, token_expires = ? WHERE id = ?");
        $stmt->bind_param("ssi", $token, $expira, $usuario['id']);
        $stmt->execute();

        // Envia o e-mail
        $link_redefinicao = "http://maniadecupake.com/redefinir_senha.php?token=" . $token;
        $assunto = "Recuperação de Senha";
        $mensagem = "Clique no link para redefinir sua senha: " . $link_redefinicao;
        mail($email, $assunto, $mensagem); // Use uma função de envio de e-mail adequada

        echo "Um e-mail foi enviado para você com instruções para redefinir sua senha.";
    } else {
        echo "E-mail não encontrado.";
    }
}
?>
