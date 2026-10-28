<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); exit;
}
?>
<link rel="stylesheet" href="style.css">

<h1>Painel</h1>
<p>Olá, <?= $_SESSION['usuario']['nome'] ?> (<?= $_SESSION['usuario']['email'] ?>)</p>
<a href="logout.php">Sair</a> | <a href="index.php">Voltar</a>
