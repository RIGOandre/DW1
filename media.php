<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Média</title>
</head>
<body>
    <h1>Calcular Média</h1>

    <form method="post">
        <label>Nota 1:</label>
        <input type="number" name="nota1" step="0.1" min="0" max="10" required>
        <br><br>
        <label>Nota 2:</label>
        <input type="number" name="nota2" step="0.1" min="0" max="10" required>
        <br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];

        $media = ($nota1 + $nota2) / 2;

        if ($media >= 7) {
            $situacao = "Aprovado";
        } elseif ($media >= 5) {
            $situacao = "Recuperação";
        } else {
            $situacao = "Reprovado";
        }

        echo "<h2>Média: " . number_format($media, 1, ',', '') . "</h2>";
        echo "<h2>Situação: $situacao</h2>";
    }
    ?>
</body>
</html>
