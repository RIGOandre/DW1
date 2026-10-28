<?php

interface Pagavel {
    public function total(): float;
}

class Produto {
    public function __construct(
        protected string $nome,
        protected float $preco,
    ) {}

    public function getNome(): string {
        return $this->nome;
    }
}

class ProdutoFisico extends Produto implements Pagavel {
    public function __construct(
        string $nome,
        float $preco,
        protected float $pesoKg,
    ) {
        parent::__construct($nome, $preco);
    }

    public function frete(): float {
        return $this->pesoKg * 5;
    }

    public function total(): float {
        return $this->preco + $this->frete();
    }
}

class ProdutoComDesconto extends ProdutoFisico {
    public function __construct(
        string $nome,
        float $preco,
        float $pesoKg,
        private float $desconto,
    ) {
        parent::__construct($nome, $preco, $pesoKg);
    }

    public function total(): float {
        $precoComDesconto = $this->preco * (1 - $this->desconto / 100);
        return $precoComDesconto + $this->frete();
    }
}

class Boleto implements Pagavel {
    private string $codigoBarras;

    public function __construct(
        private float $valor,
    ) {
        $this->codigoBarras = $this->gerarCodigoBarras();
    }

    private function gerarCodigoBarras(): string {
        $codigo = '';
        for ($i = 0; $i < 44; $i++) {
            $codigo .= random_int(0, 9);
        }
        return $codigo;
    }

    public function getCodigoBarras(): string {
        return $this->codigoBarras;
    }

    public function total(): float {
        return $this->valor;
    }
}

$itens = [
    new ProdutoFisico("Camiseta", 49.90, 0.5),
    new ProdutoComDesconto("Calça Jeans", 129.90, 1, 20),
    new Boleto(250.00),
];

foreach ($itens as $item) {
    if ($item instanceof Produto) {
        echo $item->getNome();
    } else {
        echo "Boleto " . $item->getCodigoBarras();
    }

    echo " - Total: R$ " . number_format($item->total(), 2, ',', '.') . "<br>";
}
