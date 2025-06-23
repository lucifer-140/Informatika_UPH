<?php

require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigInstance {
    private static $twig = null;

    public static function getInstance() {
        if (self::$twig === null) {
            $loader = new FilesystemLoader('templates');
            self::$twig = new Environment($loader);
        }

        return self::$twig;
    }
}

