<?php
// public/index.php - Front Controller
session_start();

require __DIR__ . '/../config/database.php';

spl_autoload_register(function($class) {
    $paths = ['controller', 'model'];
    foreach ($paths as $p) {
        $file = __DIR__ . "/../{$p}/{$class}.php";
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

require __DIR__ . '/../controller/Router.php';