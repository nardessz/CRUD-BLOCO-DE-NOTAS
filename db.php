<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "crud_bloco_de_notas_gaucho_carlos";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn-> connect_error) {
        die("Conexão falhou:" . $conn-> connect_error);
    }
?>