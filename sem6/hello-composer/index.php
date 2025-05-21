<?php

require 'vendor/autoload.php';

//use Uph\Hello\Hello as Hi;

//$hello = new Uph\Hello\Hello('Budi');
//$hello = new Hi('Budi');

//$hello->sayHello();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('index.html.twig', ['name' => 'Fabien', 'age' => 80]);