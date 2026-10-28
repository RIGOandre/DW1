<?php
require 'db.php';
require 'funcoes.php';

$produtos = listarProdutos($pdo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        h1 { text-align: center; }
        .produtos { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .produto { background: #fff; border-radius: 8px; padding: 15px; width: 200px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,.1); }
        .preco { color: #2a7d2a; font-weight: bold; font-size: 1.2em; }
    </style>
</head>
<body>
    <h1>Loja PHP</h1>
    <p style="text-align: center"><a href="form.php">+ Cadastrar produto</a></p>

    <div class="produtos">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <h3><?= e($produto['nome']) ?></h3>
                <p class="preco"><?= formatarPreco($produto['preco']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
