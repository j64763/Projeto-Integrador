<html>
<body>
<?php

$cep =  $_GET['cep'];



if (!strncasecmp($cep, "0",1)) {
    echo "Atende";
}
else {
    echo "Que pena. Infelizmente não atendemos para o seu endereço =/";
}

?>
</body>

</html>
