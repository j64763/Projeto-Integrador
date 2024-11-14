<?php

function getConnection() {
    static $connection = null;

    if ($connection === null) {
        $connection = mysqli_connect("localhost", "u221154975_site", 'a784T$a1', "u221154975_MANIADECUPCAKE");
        if (!$connection) {
            die("Conexão falhou: " . mysqli_connect_error());
        }
    }

    return $connection;
}

?>