<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tabuada</title>
</head>
<body>
    <h1>Tabuada</h1>

    <form method="post">
        <label>Número:</label>
        <input type="number" name="numero" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero = $_POST['numero'];

        echo "<h2>Tabuada do $numero</h2>";

        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado <br>";
        }
    }
    ?>
</body>
</html>
