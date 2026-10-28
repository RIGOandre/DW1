<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';

  if ($email === 'admin@loja.com' && $senha === '123456') {
    session_regenerate_id(true);   // evita fixação de sessão
    $_SESSION['usuario'] = ['nome' => 'Admin', 'email' => $email];
    header('Location: painel.php'); exit;
  }
  $erro = 'Credenciais inválidas';
}
?>
<link rel="stylesheet" href="style.css">
<form method="post"> <input name="email"> <input name="senha" type="password"> <button>Entrar</button> </form>
<?php if (isset($erro)): ?>
<p style="color:red"><?= $erro ?></p>
<?php endif; ?>

<a href="index.php">Voltar</a>
