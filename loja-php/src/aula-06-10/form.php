<?php
require 'db.php';
require 'funcoes.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $preco = (float) str_replace(',', '.', $_POST['preco'] ?? '');

    if ($nome === '' || $preco <= 0) {
        $erro = 'Preencha o nome e um preço maior que zero.';
    } else {
        cadastrarProduto($pdo, $nome, $preco);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        form { background: #fff; max-width: 350px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,.1); }
        h1 { text-align: center; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 15px; width: 100%; padding: 10px; background: #2a7d2a; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        .erro { color: #c00; }
        a { display: block; text-align: center; margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Cadastrar Produto</h1>

    <form method="post">
        <?php if ($erro): ?>
            <p class="erro"><?= $erro ?></p>
        <?php endif; ?>

        <label>Nome
            <input type="text" name="nome" value="<?= e($_POST['nome'] ?? '') ?>" required>
        </label>

        <label>Preço
            <input type="text" name="preco" value="<?= e($_POST['preco'] ?? '') ?>" placeholder="49,90" required>
        </label>

        <button type="submit">Cadastrar</button>
        <a href="index.php">Voltar para a loja</a>
    </form>
</body>
</html>
