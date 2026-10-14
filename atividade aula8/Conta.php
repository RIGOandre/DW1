<?php
class Conta {
    private float $saldo = 0;

    public function __construct(private Cliente $titular, float $saldoInicial = 0) {
        if ($saldoInicial > 0) $this->depositar($saldoInicial);
    }

    public function getTitular(): Cliente { return $this->titular; }
    public function getSaldo(): float { return $this->saldo; }

    public function depositar(float $valor): void {
        if ($valor <= 0) throw new InvalidArgumentException('O depósito deve ser maior que zero.');
        $this->saldo += $valor;
    }

    public function sacar(float $valor): void {
        if ($valor <= 0) throw new InvalidArgumentException('O saque deve ser maior que zero.');
        if ($valor > $this->saldo) throw new Exception('Saldo insuficiente.');
        $this->saldo -= $valor;
    }
}
