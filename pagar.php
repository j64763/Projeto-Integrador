<?php

session_start();

echo 'Em construcao';

require 'vendor/autoload.php'; // Autoload do Composer

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;

session_start();

// Dados do pagamento
$valor = $_SESSION['total']; // Valor do pagamento
$chave_pix = ''; // Sua chave PIX
$descricao = 'Mania de Cupcake'; // Descrição do pagamento

// Formato do payload do PIX
$payload = "00020101021126780014br.gov.bcb.pix0116" . $chave_pix . "0213" . str_pad($valor * 100, 10, '0', STR_PAD_LEFT) . "5303986BR5906" . $descricao . "6006" . date('YmdHis');

// Geração do QR Code
$qrCode = new QrCode($payload);
$qrCode->setSize(300);
$qrCode->setMargin(10);
$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);

// Salvar o QR Code em um arquivo
$qrCode->writeFile(__DIR__ . '/qrcode.png'); // Salva como qrcode.png

// Exibir o QR Code na página
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento PIX</title>
</head>
<body>

<h1>Pagar com PIX</h1>
<p>Valor: R$ <?= number_format($valor, 2, ',', '.') ?></p>
<p>Descreva o pagamento: <?= htmlspecialchars($descricao) ?></p>
<img src="qrcode.png" alt="QR Code PIX">

</body>
</html>