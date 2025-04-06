<?php

spl_autoload_register(function (string $className) {
    $path      = str_replace('\\', '/', $className);
    $classPath = INSURANCE_PATH . "/$path" . ".php";
    if (file_exists($classPath)) {
        require $classPath;
    }
});
