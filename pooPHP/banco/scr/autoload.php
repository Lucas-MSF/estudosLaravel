<?php

spl_autoload_register(function(string $className){
    $Route= str_replace('Alura\\Banco','src', $className);
    $Route= str_replace('\\',DIRECTORY_SEPARATOR, $Route);
    $Route.= '.php';
    echo $className;
    exit();
    // if (file_exists($Route)) {
    //     return require_once $Route;
    // }
});