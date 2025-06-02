<?php
require '../vendor/autoload.php';

use Uph\Hello\Twig;

$twig = Twig::make(__DIR__ . '/templates');

session_start();

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($username) || empty($password)) {
        echo $twig->render('login.html.twig', ['error' => 'username and password are required.']);
        die();
    }
    if ($username === 'user' && $password === 'pass') {
        session_regenerate_id();
        $_SESSION['authenticated'] = true;
        header('Location: index.php');
        die();
    }

    echo $twig->render('login.html.twig', ['error' => 'Invalid username or password.']);
    die();
}

echo $twig->render('login.html.twig');