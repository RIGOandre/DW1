<?php
session_start();
require 'catalogo.php';
?>
<link rel="stylesheet" href="style.css">

<h1>Produtos</h1>
<ul>
<?php foreach ($produtos as $id => $produto): ?>
    <li>
        <?= $produto['nome'] ?> - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
        <a href="carrinho.php?add=<?= $id ?>">Adicionar ao carrinho</a>
    </li>
<?php endforeach; ?>
</ul>
<a href="index.php">Voltar</a>
