
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexao.php'; 

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

      
    }
    else {
        echo "E-mail não encontrado.";
    }

}



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sacmaniadecupcake@gmail.com';                     //SMTP username
    $mail->Password   = 'nlzn hpqq vnrx rjcj ';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sacmaniadecupcake@gmail.com', 'SAC Mania de Cupcake');
    $mail->addAddress($email);               //Name is optional


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    
    // Envia o e-mail - firebrick-mosquito-536476.hostingersite.com/redefinir_senha.php
    $link_redefinicao = "firebrick-mosquito-536476.hostingersite.com
/redefinir_senha.php?token=" . $token;
    $mail->Subject = "Redefinicao de Senha";
    $mail->Body = "Clique no link para redefinir sua senha: " . $link_redefinicao;

    // Enviar e-mail usando uma biblioteca apropriada ou método mais robusto
   $mail->send();

        echo "Um e-mail foi enviado para você com instruções para redefinir sua senha.";

} catch (Exception $e) {
    echo  "Falha ao enviar o e-mail.; Mailer Error: {$mail->ErrorInfo}";
}


?>
