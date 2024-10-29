<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pagamento = $_POST['pagamento'];

    if ($pagamento == 'Pix') {
 
        echo "<form method='post' action='boleto.php'> <button class='botoes' type='submit'>Pagar com Pix</button></form>";
    } elseif ($pagamento == 'Boleto') {
        echo "<form method='post' action='boleto.php'>
        <button type='submit' class='botoes' >Gerar Boleto</button>
        </form>";
    } elseif ($pagamento == 'Cartão') {
 
        echo "
        
        <p>Preencha os dados do cartão:</p>
        <form method='post' action='pagar.php' class='cartao'>
            <label for='numero'>Número do Cartão</label><br>
            <input type='text' name='numero' required id='numero'><br>
            <label for='nome'>Nome</label><br>
            <input type='text' name='nome' required id='nome'><br>
            <label for='data-venc'>Data de Vencimento</label><br>
            <input type='text' name='data-venc' required placeholder='MM/AA' maxlength='5' id='data'><br>
            <label for='cod'>Código Verificador</label><br>
            <input type='text' name='cod' required maxlength='3' id='cod'><br>
            <button type='submit' class='botao-confirmar'>Continuar</button>
        </form>";
    }
    $_SESSION['pagamento'] = $pagamento;
}
?>
