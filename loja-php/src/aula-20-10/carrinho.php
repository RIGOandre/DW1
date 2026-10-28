<?php
require 'autoload.php';
require 'catalogo.php';

$carrinho = new CarrinhoSessao();

if (isset($_GET['add']) && isset($produtos[$_GET['add']])) {
    $carrinho->adicionar((int) $_GET['add']);
    header('Location: carrinho.php'); exit;
}

if (isset($_GET['remover'])) {
    $carrinho->remover((int) $_GET['remover']);
    header('Location: carrinho.php'); exit;
}

if (isset($_GET['limpar'])) {
    $carrinho->limpar();
    header('Location: carrinho.php'); exit;
}
?>
<link rel="stylesheet" href="style.css">

<h1>Carrinho</h1>
<?php if ($carrinho->vazio()): ?>
<p>Carrinho vazio.</p>
<?php else: ?>
<ul>
<?php foreach ($carrinho->itens() as $id => $qtd): ?>
    <li>
        <?= $produtos[$id]['nome'] ?> x <?= $qtd ?> = R$ <?= number_format($produtos[$id]['preco'] * $qtd, 2, ',', '.') ?>
        <a href="carrinho.php?remover=<?= $id ?>">Remover</a>
    </li>
<?php endforeach; ?>
</ul>
<p><strong>Total: R$ <?= number_format($carrinho->total($produtos), 2, ',', '.') ?></strong></p>
<a href="carrinho.php?limpar=1">Limpar carrinho</a> |
<?php endif; ?>
<a href="produtos.php">Continuar comprando</a> | <a href="index.php">Voltar</a>
