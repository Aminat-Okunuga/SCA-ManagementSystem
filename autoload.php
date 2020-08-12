<?php

spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name).'.php';
    include "App/$file";
});

session_start();
define('BASE', __DIR__ . '/');