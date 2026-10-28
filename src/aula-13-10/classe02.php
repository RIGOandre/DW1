<?php

class Produto {
    private string $nome;
    private float $preco;
    private ?string $imagem;

    public function __construct(string $nome, float $preco, ?string $imagem = null) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setImagem($imagem);
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $nome = trim($nome);
        if ($nome === '') {
            throw new InvalidArgumentException('O nome não pode ser vazio.');
        }
        $this->nome = $nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setPreco(float $preco): void {
        if ($preco <= 0) {
            throw new InvalidArgumentException('O preço deve ser maior que zero.');
        }
        $this->preco = $preco;
    }

    public function getImagem(): ?string {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): void {
        $this->imagem = $imagem;
    }

    public function aplicarDesconto(float $pct): float {
        $pct = max(0, min(100, $pct));
        return $this->preco * (1 - $pct / 100);
    }

    public static function formatar(float $valor): string {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}

function e(?string $texto): string {
    return htmlspecialchars($texto ?? '');
}

$produtos = [
    new Produto('Camiseta Básica', 49.90, '../aula-06-10/img/camiseta.png'),
    new Produto('Calça Jeans Slim', 129.90, '../aula-06-10/img/calca.png'),
    new Produto('Boné', 39.90),
    new Produto('Tênis Casual', 199.90),
];

$produtos[2]->setNome('Boné Aba Curva');
$produtos[2]->setPreco(44.90);

$desconto = (float) str_replace(',', '.', $_GET['desconto'] ?? '0');
$desconto = max(0, min(100, $desconto));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja PHP - Getters e Setters</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        h1 { text-align: center; }
        .filtro { background: #fff; max-width: 350px; margin: 0 auto 20px; padding: 15px 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,.1); display: flex; gap: 10px; align-items: flex-end; }
        .filtro label { flex: 1; }
        .filtro input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        .filtro button { padding: 9px 15px; background: #2a7d2a; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        .produtos { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .produto { background: #fff; border-radius: 8px; padding: 15px; width: 200px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,.1); }
        .produto img { width: 100%; height: 180px; object-fit: contain; }
        .sem-imagem { height: 180px; display: flex; align-items: center; justify-content: center; background: #eee; color: #999; }
        .preco { color: #2a7d2a; font-weight: bold; font-size: 1.2em; margin: 5px 0; }
        .preco-antigo { color: #999; text-decoration: line-through; margin: 5px 0 0; }
    </style>
</head>
<body>
    <h1>Loja PHP</h1>

    <form class="filtro" method="get">
        <label>Desconto (%)
            <input type="number" name="desconto" min="0" max="100" step="1" value="<?= e((string) $desconto) ?>">
        </label>
        <button type="submit">Aplicar</button>
    </form>

    <div class="produtos">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <?php if ($produto->getImagem()): ?>
                    <img src="<?= e($produto->getImagem()) ?>" alt="<?= e($produto->getNome()) ?>">
                <?php else: ?>
                    <div class="sem-imagem">Sem imagem</div>
                <?php endif; ?>
                <h3><?= e($produto->getNome()) ?></h3>
                <?php if ($desconto > 0): ?>
                    <p class="preco-antigo"><?= Produto::formatar($produto->getPreco()) ?></p>
                <?php endif; ?>
                <p class="preco"><?= Produto::formatar($produto->aplicarDesconto($desconto)) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
