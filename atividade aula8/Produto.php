<?php
class Produto {
  public function __construct(
    private int $id, private string $nome,
    private float $preco, private int $estoque
  ) {}
  public function getId(): int { return $this->id; }
  public function getNome(): string { return $this->nome; }
  public function getPreco(): float { return $this->preco; }
  public function temEstoque(int $qtd): bool { return $this->estoque >= $qtd; }
}
