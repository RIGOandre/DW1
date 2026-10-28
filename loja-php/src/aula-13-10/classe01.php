<?php

class Produto {
    public function __construct(
        protected string $nome,
        protected float $preco,
    ) {}

    public function descricao(): string {
        return "Produto: $this->nome, Preço: R$ $this->preco";
    }
}

class ProdutoDigital extends Produto {
    public function __construct(
        string $nome,
        float $preco,
        private float $tamanhoMB,
    ) {
        parent::__construct($nome, $preco);
    }

    public function frete(): float {
        return $this->tamanhoMB * 0.1;
    }
}

$t = new ProdutoDigital("ebook", 49.90, 100);
echo $t->descricao();
echo "<br>Frete: R$ " . $t->frete();
