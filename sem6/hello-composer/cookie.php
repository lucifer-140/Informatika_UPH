<?php

require 'vendor/autoload.php';

use Uph\Hello\Twig;

$twig = Twig::make(__DIR__ . '/templates');

if (isset($_COOKIE['nama'])) {
    // increment count cookie
    setcookie('count', ($_COOKIE['count'] ?? 0) + 1, time() + 60);
    echo $twig->render(
        'cookie.html.twig',
        [
        'nama' => $_COOKIE['nama'],
        'count' => $_COOKIE['count']
        ]
    );
} elseif (isset($_POST['nama'])) {
    // set nama & count cookie
    setcookie('nama', $_POST['nama'], time() + 60);
    setcookie('count', ($_COOKIE['count'] ?? 0) + 1, time() + 60);
    // redirect back to cookie
    header('Location: /cookie.php', false, 302);
} else {
    echo $twig->render(
        'cookie-form.html.twig'
    );
}

