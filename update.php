<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo_notas = $_POST['titulo_notas'];
        $categoria_notas = $_POST['categorias_notas'];
        $conteudo_notas = $_POST['conteudo_notas'];

        $sql = "UPDATE notas SET titulo_notas = '$titulo_notas', categorias_notas = '$categoria_notas', conteudo_notas = '$conteudo_notas' WHERE id_notas =$id";

        if ($conn -> query($sql) === TRUE) {
            echo "Nota atualizada com sucesso!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn -> error;
        }
    }
    $sql = "SELECT * FROM notas WHERE id_notas = '$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Editar Notas</title>
</head>
<body>
    
<?php 
    if (isset($_GET['id'])) { ?>
    <h2>Editar Nota</h2>
    <form method="POST" action="update.php?id=<?php echo $row['id_notas'];?>">
        <label for="titulo_notas">Título:</label>
        <input type="text" id="titulo_notas" name="titulo_notas" value="<?php echo $row['titulo_notas']; ?>" required><br><br>
        <label for="categorias_notas">Categoria:</label>
        <input type="text" id="categorias_notas" name="categorias_notas" value="<?php echo $row['categorias_notas']; ?>" required><br><br>
        <label for="conteudo_notas">Conteúdo:</label><br>
        <textarea id="conteudo_notas" name="conteudo_notas" rows="5" required><?php echo $row['conteudo_notas']; ?></textarea><br><br>
        <button class="botao" type="submit" name="update">Atualizar Nota</button>
    </form>
<?php 
} else {
}
?>

</body>
</html>
<a class="botao" href="read.php">Voltar para o read</a>