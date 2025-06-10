<?php

require_once 'vendor/autoload.php';

use Lucy\Uts\DB;

require_once 'src/Twig.php';
$twig = TwigInstance::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'] ?? '';
    $judul = $_POST['judul'] ?? '';
    $pengarang = $_POST['pengarang'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $halaman = (int) ($_POST['halaman'] ?? 0);

    if ($isbn && $judul && $pengarang && $kategori && $halaman > 0) {
        $db = DB::getDB();
        $stmt = $db->prepare("INSERT INTO buku (isbn, judul, pengarang, kategori, halaman) VALUES (:isbn, :judul, :pengarang, :kategori, :halaman)");
        $stmt->execute([
            ':isbn' => $isbn,
            ':judul' => $judul,
            ':pengarang' => $pengarang,
            ':kategori' => $kategori,
            ':halaman' => $halaman,
        ]);
        header('Location: list.php');
        exit;
    }
}

echo $twig->render('form.twig.html', [
    'action' => 'create',
    'form_data' => [
        'isbn' => '',
        'judul' => '',
        'pengarang' => '',
        'kategori' => '',
        'halaman' => '',
    ],
    'form_title' => 'Create Buku',
    'submit_label' => 'Create',
]);