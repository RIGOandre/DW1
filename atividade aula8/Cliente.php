<?php
class Cliente {
    private string $nome;
    private string $email;

    public function __construct(string $nome, string $email) {
        $this->setNome($nome);
        $this->setEmail($email);
    }

    public function getNome(): string { return $this->nome; }

    public function setNome(string $nome): void {
        $nome = trim($nome);
        if ($nome === '') throw new InvalidArgumentException('O nome não pode ser vazio.');
        $this->nome = $nome;
    }

    public function getEmail(): string { return $this->email; }

    public function setEmail(string $email): void {
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("E-mail inválido: $email");
        }
        $this->email = $email;
    }
}
