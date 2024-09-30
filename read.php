<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Read</title>
</head>
<body>
    <div class="container my-4">
        <h1>Notas</h1>
        <table class="table">
            <thread class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Data</th>
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
                    </tr>
                    <tr>
                    <th>Conteúdo</th>
                    </tr>
                    <td>{$row['conteudo_notas']}</td>
                    <td>
                    <a href='update.php?id={$row['id_notas']}'>Editar</a> |
                    <a href='delete.php?id={$row['id_notas']}'>Excluir</a>
                    <br> <br>
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
        <a class="botao" href="create.php">Inserir nova nota</a> <br>
    </div>
</body>
</html>