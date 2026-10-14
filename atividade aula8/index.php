<?php
require 'Cliente.php';
require 'Conta.php';
require 'Produto.php';
require 'Carrinho.php';

function reais($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atividade Aula 8</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 0 10px; }
        .erro { color: red; }
    </style>
</head>
<body>
    <h1>Atividade Aula 8</h1>

    <h2>1. Cliente</h2>
    <?php
    $cliente = new Cliente('Ana Souza', 'ana@email.com');
    echo '<p>Nome: ' . $cliente->getNome() . '</p>';
    echo '<p>E-mail: ' . $cliente->getEmail() . '</p>';

    $cliente->setEmail('ana.souza@email.com');
    echo '<p>Novo e-mail: ' . $cliente->getEmail() . '</p>';

    try {
        $cliente->setEmail('ana@');
    } catch (Exception $e) {
        echo '<p class="erro">' . $e->getMessage() . '</p>';
    }
    ?>

    <h2>2. Conta</h2>
    <?php
    $conta = new Conta($cliente, 100);
    echo '<p>Saldo inicial: ' . reais($conta->getSaldo()) . '</p>';

    $conta->depositar(50);
    echo '<p>Depositou R$ 50,00. Saldo: ' . reais($conta->getSaldo()) . '</p>';

    $conta->sacar(30);
    echo '<p>Sacou R$ 30,00. Saldo: ' . reais($conta->getSaldo()) . '</p>';

    try {
        $conta->sacar(500);
    } catch (Exception $e) {
        echo '<p class="erro">Sacar R$ 500,00: ' . $e->getMessage() . '</p>';
    }

    echo '<p>Saldo final: ' . reais($conta->getSaldo()) . '</p>';
    ?>

    <h2>3. Carrinho</h2>
    <?php
    $camiseta = new Produto(1, 'Camiseta', 49.90, 10);
    $calca = new Produto(2, 'Calça', 129.90, 3);
    $tenis = new Produto(3, 'Tênis', 199.90, 1);

    $carrinho = new Carrinho();
    $carrinho->adicionar($camiseta, 2);
    $carrinho->adicionar($calca, 1);

    foreach ($carrinho->getItens() as $item) {
        echo '<p>' . $item['qtd'] . 'x ' . $item['produto']->getNome() . ' - ' . reais($item['produto']->getPreco()) . '</p>';
    }

    try {
        $carrinho->adicionar($tenis, 2);
    } catch (Exception $e) {
        echo '<p class="erro">Tênis: ' . $e->getMessage() . '</p>';
    }

    echo '<p><strong>Total: ' . reais($carrinho->total()) . '</strong></p>';
    ?>
</body>
</html>
