<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$db = DB::getDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $editId = $_POST['edit_id'];
    $task = trim($_POST['task']);
    $status = $_POST['status'];

    if ($editId && $task && $status) {
        $q = $db->prepare(
            "UPDATE todo SET task = :task, status = :status, updated_at = NOW() WHERE id = :id"
        );
        $q->execute([
            'id' => $editId,
            'task' => $task,
            'status' => $status,
        ]);
    }

    header("Location: list.php");
    exit;
}