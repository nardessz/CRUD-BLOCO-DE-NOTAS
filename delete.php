<?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM notas WHERE id_notas = '$id'";
    if($conn -> query($sql) === TRUE) {
        echo "Registro excluído com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>". $conn -> error;
    }
    $conn -> close();
    header ("Location: read.php");
    exit();
?>