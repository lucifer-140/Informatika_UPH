<?php
require '../vendor/autoload.php';
use Uph\Hello\Twig;
$twig = twig::make(__DIR__ . '/templates');
session_start();
if (!($_SESSION['authenticated'] ?? false)){
    header('Location: /auth/login.php');
    die();
}

echo $twig->render('protected.html.twig');