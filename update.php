<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM notas WHERE id = $id";
    $result = $conn->query($sql);
    $nota = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $titulo_notas = $_POST['titulo_notas'];
    $categoria_notas = $_POST['categorias_notas'];
    $conteudo_notas = $_POST['conteudo_notas'];

    $sql = "UPDATE notas SET titulo_notas='$titulo_notas', categorias_notas='$categoria_notas', conteudo_notas='$conteudo_notas' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: read.php'); 
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
</head>
<body>

<h1>Editar Nota</h1>

<form method="POST">
    <label for="titulo_notas">Título:</label>
    <input type="text" id="titulo_notas" name="titulo_notas" value="<?php echo $nota['titulo_notas']; ?>" required><br><br>

    <label for="categorias_notas">Categoria:</label>
    <input type="text" id="categorias_notas" name="categorias_notas" value="<?php echo $nota['categorias_notas']; ?>" required><br><br>

    <label for="conteudo_notas">Conteúdo:</label><br>
    <textarea id="conteudo_notas" name="conteudo_notas" rows="5" required><?php echo $nota['conteudo_notas']; ?></textarea><br><br>

    <button type="submit" name="update">Atualizar Nota</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
