
<?php

class db {
private $host = 'localhost';

private $usuario = 'site';

private $senha = 'etis';

private $database = 'MANIADECUPCAKE';

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