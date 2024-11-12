<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pagamento = $_POST['pagamento'];

    if ($pagamento == 'Pix') {
 
        echo "<form method='post' action='pagar.php'> <button class='botoes' type='submit'>Pagar com Pix</button></form>";
    } elseif ($pagamento == 'Boleto') {
        echo "<form method='post' action='boleto.php'>
        <button type='submit' class='botoes' >Gerar Boleto</button>
        </form>";
    } elseif ($pagamento == 'Cartão') {
 
        echo "
        
        <p>Preencha os dados do cartão:</p>
        <form method='post' action='pagar.php' class='cartao'>
            <label for='numero'>Número do Cartão</label><br>
            <input type='text' name='numero' required id='numero' maxlength='19' oninput='formatarNumeroCartao(this)'><br>
            <label for='nome'>Nome</label><br>
            <input type='text' name='nome' required id='nome'><br>
            <label for='data-venc'>Data de Vencimento</label><br>
            <input type='text' name='data-venc' maxlength='5' oninput='validarValidade(this)' required placeholder='MM/AA' id='data'><br>
            <label for='cod'>Código Verificador</label><br>
            <input type='text' name='cod' required maxlength='3' oninput='validarCodigoVerificador(this)' id='cod'><br>
            <button class='botao-confirmar'>Guardar Cartão</button>
            <button type='submit' class='botao-confirmar'>Continuar</button>
        </form>";
    }
    $_SESSION['pagamento'] = $pagamento;
}
?>

<script>
        function formatarNumeroCartao(input) {
            // Remove caracteres não numéricos
            let valor = input.value.replace(/\D/g, '');
            // Adiciona espaço a cada 4 dígitos
            input.value = valor.replace(/(.{4})/g, '$1 ').trim();
        }

        function validarValidade(input) {
            // Permite apenas 2 dígitos para mês e 2 para ano
            let valor = input.value.replace(/\D/g, '');
            if (valor.length > 2) {
                valor = valor.slice(0, 2) + '/' + valor.slice(2, 4);
            }
            input.value = valor;
        }

        function validarCodigoVerificador(input) {
            // Permite apenas 3 dígitos
            let valor = input.value.replace(/\D/g, '');
            if (valor.length > 3) valor = valor.slice(0, 3);
            input.value = valor;
        }
    </script>