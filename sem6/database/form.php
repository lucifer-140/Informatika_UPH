<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$db = DB::getDB();

$taskDetails = [
    'id' => null,
    'task' => '',
    'status' => '',
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $db->prepare("SELECT * FROM todo WHERE id = :id");
    $q->execute(['id' => $id]);
    $taskDetails = $q->fetch(PDO::FETCH_ASSOC);

    if (!$taskDetails) {
        die("Task not found.");
    }
}

echo $twig->render('form.twig.html', [
    'taskDetails' => $taskDetails,
]);