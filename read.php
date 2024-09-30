<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>
<body>
    <div>
        <button type="submit" href="create.php">Inserir nova nota</a></button> <br>
        <table>
            <thread>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Data</th>
                    <th scope="col">Conteúdo</th>
                </tr>
            </thread>
            <tbody>
            <?php
            include 'db.php';
            $sql = "SELECT * FROM notas";
            $result = $conn -> query ($sql);
            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "<tr>
                    <th scope='row'> {$row['id_notas']} </th>
                    <td>{$row['titulo_notas']}</td>
                    <td>{$row['categorias_notas']}</td>
                    <td>{$row['data_notas']}</td>
                    <td>{$row['conteudo_notas']}</td>
                    <td>
                    <a href='update.php?id={$row['id_notas']}'>Editar</a> |
                    <a href='delete.php?id={$row['id_notas']}'>Excluir</a>
                    </td>
                    </tr>";
                }
            } else {
            echo "Nenhum registro encontrado";
            }
            $conn -> close();
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>