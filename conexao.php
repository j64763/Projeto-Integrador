
<?php

class db {
private $host = 'localhost';

private $usuario = 'u221154975_site';

private $senha = 'a784T$a1';

private $database = 'u221154975_MANIADECUPCAKE';

public function conectar(){
    $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database );
    
    mysqli_set_charset($con, 'utf8');
    if (mysqli_connect_errno()){
        echo 'Erro ao tentar se conectar ao banco de dados'.mysqli_connect_error();
    }
    return $con;
}

    
}
?>