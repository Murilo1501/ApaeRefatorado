<?php
spl_autoload_register(function ($class) {
    // Converte o namespace da classe em um caminho de arquivo
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    // Verifica se o arquivo existe antes de incluir
    if (file_exists($file)) {
        include $file;
    }
});

require_once __DIR__ . '/public/index.php';
require_once __DIR__ . '/View/view.php';
require_once __DIR__.'/App/Model/eventsModel.php';