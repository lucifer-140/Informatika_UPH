<?php

require_once 'vendor/autoload.php';

use Lucy\Uts\DB;

require_once 'src/Twig.php';
$twig = TwigInstance::getInstance();

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: list.php');
    exit;
}

$db = DB::getDB();
$stmt = $db->prepare("SELECT * FROM buku WHERE id = :id");
$stmt->execute([':id' => $id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$buku) {
    header('Location: list.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'] ?? '';
    $judul = $_POST['judul'] ?? '';
    $pengarang = $_POST['pengarang'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $halaman = (int) ($_POST['halaman'] ?? 0);

    if ($isbn && $judul && $pengarang && $kategori && $halaman > 0) {
        $stmt = $db->prepare("UPDATE buku SET isbn = :isbn, judul = :judul, pengarang = :pengarang, kategori = :kategori, halaman = :halaman WHERE id = :id");
        $stmt->execute([
            ':isbn' => $isbn,
            ':judul' => $judul,
            ':pengarang' => $pengarang,
            ':kategori' => $kategori,
            ':halaman' => $halaman,
            ':id' => $id,
        ]);
        header('Location: list.php');
        exit;
    }
}

echo $twig->render('form.twig.html', [
    'action' => 'edit',
    'form_data' => [
        'isbn' => htmlspecialchars($buku['isbn']),
        'judul' => htmlspecialchars($buku['judul']),
        'pengarang' => htmlspecialchars($buku['pengarang']),
        'kategori' => htmlspecialchars($buku['kategori']),
        'halaman' => htmlspecialchars($buku['halaman']),
    ],
    'form_title' => 'Edit Buku',
    'submit_label' => 'Update',
]);