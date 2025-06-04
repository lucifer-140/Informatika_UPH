<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$id = $_POST['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    $db = DB::getDB();
    $deleteQuery = $db->prepare(
        'DELETE FROM todo WHERE id = :id'
    );

    $deleteQuery->execute(['id' => $id]);

    header('Location: list.php');
    exit;
}

header('Location: list.php');
exit;