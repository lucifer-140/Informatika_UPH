<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$task = $_POST['task'] ?? null;
$status = $_POST['status'] ?? null;

if (!$task || !$status) {
    header('Location: form.twig.html');
    die("Invalid input");
}

$db = DB::getDB();
$q = $db->prepare(
    "INSERT INTO todo (task, status, created_at, updated_at) VALUES (:task, :status, NOW(), NOW())"
);

$q->execute([
    'task' => $task,
    'status' => $status,
]);

header('Location: list.php');
exit;