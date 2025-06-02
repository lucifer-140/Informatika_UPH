<?php
require 'vendor/autoload.php';
use Uph\Hello\Twig;
$twig = Twig::make(__DIR__ . '/templates');
session_start();
if (isset($_SESSION['nama'])) {
    $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
    echo $twig->render(
        'session.html.twig',
        [
            'nama' => $_SESSION['nama'],
            'count' => $_SESSION['count'],
        ],
    );
} else if (isset($_POST['nama'])) {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['count'] = 1;
    session_regenerate_id();
    header('Location: /session.php', false, 302);
} else {
    echo $twig->render('session-form.html.twig');
}