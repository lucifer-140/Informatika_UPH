<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$db = DB::getDB();

$q = $db->query("SELECT * FROM todo");
$rows = $q->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('list.twig.html', [
    'rows' => $rows,
    'rows_count' => count($rows),
]);