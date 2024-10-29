<?php

function getConnection() {
    static $connection = null;

    if ($connection === null) {
        $connection = mysqli_connect("localhost", "site", "etis", "MANIADECUPCAKE");
        if (!$connection) {
            die("Conexão falhou: " . mysqli_connect_error());
        }
    }

    return $connection;
}

?>