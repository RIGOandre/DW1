<?php
require __DIR__ . '/../../database/conexoes.php';

use App\Database\Conexao;

$pdo = Conexao::get();
$tabelas = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
?>
<h1>Conexão com o banco</h1>
<p>Tabelas do banco loja:</p>
<ul>
<?php foreach ($tabelas as $tabela): ?>
    <li><?= htmlspecialchars($tabela) ?></li>
<?php endforeach; ?>
</ul>
<a href="../">Voltar</a>
