<?php
include 'db.php';

$nota = [
    'titulo_notas' => '',
    'categorias_notas' => '',
    'conteudo_notas' => ''
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM notas WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $nota = $result->fetch_assoc();
    }
}

if (isset($_POST['update'])) {
    $titulo_notas = $_POST['titulo_notas'];
    $categoria_notas = $_POST['categorias_notas'];
    $conteudo_notas = $_POST['conteudo_notas'];
    $id = $_POST['id']; 

    $sql = "UPDATE notas SET titulo_notas='$titulo_notas', categorias_notas='$categoria_notas', conteudo_notas='$conteudo_notas' WHERE id=$id";
    $conn->query($sql);
    header('Location: '.$_SERVER['PHP_SELF']);
}

$sql = "SELECT titulo_notas FROM notas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notas</title>
</head>
<body>

<h1>Lista de Notas</h1>

<ul>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <li>
            <?php echo $row['titulo_notas']; ?>
            <a href="?id=<?php echo $row['id']; ?>">Editar</a>
        </li>
    <?php endwhile; ?>
</ul>

<?php if (isset($_GET['id'])): ?>
    <h2>Editar Nota</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"> <!-- Campo oculto com o ID da nota -->
        
        <label for="titulo_notas">Título:</label>
        <input type="text" id="titulo_notas" name="titulo_notas" value="<?php echo $nota['titulo_notas']; ?>" required><br><br>

        <label for="categorias_notas">Categoria:</label>
        <input type="text" id="categorias_notas" name="categorias_notas" value="<?php echo $nota['categorias_notas']; ?>" required><br><br>

        <label for="conteudo_notas">Conteúdo:</label><br>
        <textarea id="conteudo_notas" name="conteudo_notas" rows="5" required><?php echo $nota['conteudo_notas']; ?></textarea><br><br>

        <button type="submit" name="update">Atualizar Nota</button>
    </form>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
