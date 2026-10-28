<?php
spl_autoload_register(function (string $classe) {
    $arquivo = __DIR__ . '/support/' . $classe . '.php';
    if (file_exists($arquivo)) {
        require $arquivo;
    }
});
