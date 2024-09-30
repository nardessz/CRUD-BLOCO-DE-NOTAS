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

    <button type="submit" name="create">Adicionar Nota</button>
</form>

<h2>Notas Existentes</h2>
<table border="1">
    <thead>
        <tr>
            <th>Título</th>
            <th>Categoria</th>
            <th>Conteúdo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['titulo_notas']); ?></td>
                    <td><?php echo htmlspecialchars($row['categorias_notas']); ?></td>
                    <td><?php echo htmlspecialchars($row['conteudo_notas']); ?></td>
                    <td>
                        <form method="POST" action="edit.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="edit">Editar</button>
                        </form>
                        <form method="POST" action="delete.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" onclick="return confirm('Tem certeza que deseja excluir esta nota?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhuma nota encontrada.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
