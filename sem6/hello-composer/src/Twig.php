<?php

namespace Uph\Hello;

class Twig
{
    public static function make($templatesDir): \Twig\Environment
    {
        $loader = new \Twig\Loader\FilesystemLoader($templatesDir);
        return new \Twig\Environment($loader);
    }
}
