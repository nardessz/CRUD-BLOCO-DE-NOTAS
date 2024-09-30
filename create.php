<?php
include 'db.php';

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['create'])) {
    $titulo_notas = $_POST['titulo_notas'];
    $categoria_notas = $_POST['categorias_notas'];
    $conteudo_notas = $_POST['conteudo_notas'];
    $sql = "INSERT INTO notas (titulo_notas, categorias_notas, conteudo_notas) VALUES ('$titulo_notas', '$categoria_notas', '$conteudo_notas')";
    $conn->query($sql);
}

$sql = "SELECT * FROM notas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco de Notas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Adicionar Nova Nota</h1>
<form method="POST">
    <label for="titulo_notas">Título:</label>
    <input type="text" id="titulo_notas" name="titulo_notas" required><br><br>

    <label for="categorias_notas">Categoria:</label>
    <input type="text" id="categorias_notas" name="categorias_notas" required><br><br>

    <label for="conteudo_notas">Conteúdo:</label><br>
    <textarea id="conteudo_notas" name="conteudo_notas" rows="5" required></textarea><br><br>

    <button class="botao" type="submit" name="create">Adicionar Nota</button>
</form>

<br>
<a class="botao" href="read.php">Voltar para o read</a>