<?php

require_once 'vendor/autoload.php';

use Lucy\Uts\DB;

$id = $_GET['id'] ?? null;

if ($id) {
    $db = DB::getDB();
    $stmt = $db->prepare("DELETE FROM buku WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header('Location: list.php');
exit;
