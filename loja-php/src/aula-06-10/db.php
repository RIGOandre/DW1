<?php
$pdo = new PDO('mysql:host=db;dbname=loja;charset=utf8mb4', 'root', 'root', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

if ($pdo->query('SELECT COUNT(*) FROM produtos')->fetchColumn() == 0) {
    require 'catalogo.php';
    $stmt = $pdo->prepare('INSERT INTO produtos (nome, preco) VALUES (?, ?)');
    foreach ($produtos as $produto) {
        $stmt->execute([$produto['nome'], $produto['preco']]);
    }
}
