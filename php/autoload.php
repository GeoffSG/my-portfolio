<?php
//  Autoload classes
function autoloader($class_name) {
    foreach(glob(__DIR__ . '/**/*.php') as $file) {
        if (basename($file, '.php') === $class_name) {
            require_once $file;
            break;
        }
    }
}

spl_autoload_register('autoloader');