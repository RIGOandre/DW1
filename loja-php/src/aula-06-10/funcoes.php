<?php
function listarProdutos(PDO $pdo): array
{
    return $pdo->query('SELECT * FROM produtos ORDER BY id')->fetchAll();
}

function cadastrarProduto(PDO $pdo, string $nome, float $preco): void
{
    $stmt = $pdo->prepare('INSERT INTO produtos (nome, preco) VALUES (?, ?)');
    $stmt->execute([$nome, $preco]);
}

function formatarPreco(float $preco): string
{
    return 'R$ ' . number_format($preco, 2, ',', '.');
}

function e(?string $texto): string
{
    return htmlspecialchars($texto ?? '');
}
