<?php

class CarrinhoSessao {
    private const CHAVE = 'carrinho';

    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION[self::CHAVE] = $_SESSION[self::CHAVE] ?? [];
    }

    public function adicionar(int $id, int $qtd = 1): void {
        $_SESSION[self::CHAVE][$id] = ($_SESSION[self::CHAVE][$id] ?? 0) + $qtd;
    }

    public function remover(int $id): void {
        unset($_SESSION[self::CHAVE][$id]);
    }

    public function limpar(): void {
        $_SESSION[self::CHAVE] = [];
    }

    public function itens(): array {
        return $_SESSION[self::CHAVE];
    }

    public function vazio(): bool {
        return empty($_SESSION[self::CHAVE]);
    }

    public function total(array $produtos): float {
        $total = 0;
        foreach ($this->itens() as $id => $qtd) {
            $total += $produtos[$id]['preco'] * $qtd;
        }
        return $total;
    }
}
