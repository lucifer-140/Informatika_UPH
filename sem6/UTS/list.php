<?php

require_once 'vendor/autoload.php';

use Lucy\Uts\DB;
use Twig\TwigFunction;

require_once 'src/Twig.php';
$twig = TwigInstance::getInstance();

$buildQueryFunction = new TwigFunction('buildQuery', function($newParams = []) {
    $currentParams = $_GET;
    $mergedParams = array_merge($currentParams, $newParams);
    return http_build_query($mergedParams);
});
$twig->addFunction($buildQueryFunction);

$db = DB::getDB();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$pageSize = isset($_GET['limit']) && in_array((int)$_GET['limit'], [10, 25, 50]) ? (int)$_GET['limit'] : 10;
$sortColumn = isset($_GET['sort']) && in_array($_GET['sort'], ['isbn', 'judul', 'pengarang']) ? $_GET['sort'] : 'judul';
$sortOrder = isset($_GET['order']) && in_array(strtolower($_GET['order']), ['asc', 'desc']) ? strtolower($_GET['order']) : 'asc';

$page = max(1, $page);
$offset = ($page - 1) * $pageSize;

$conditions = [];
$params = [];

if (!empty($search)) {
    $conditions[] = "(isbn LIKE :search OR judul LIKE :search OR pengarang LIKE :search)";
    $params[':search'] = '%' . $search . '%';
}

if (!empty($kategori)) {
    $conditions[] = "kategori = :kategori";
    $params[':kategori'] = $kategori;
}

$whereClause = !empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

$sql = "SELECT * FROM buku $whereClause ORDER BY $sortColumn $sortOrder LIMIT :limit OFFSET :offset";
$sqlCount = "SELECT COUNT(*) FROM buku $whereClause";

$query = $db->prepare($sql);
$queryCount = $db->prepare($sqlCount);

foreach ($params as $key => $value) {
    $query->bindValue($key, $value);
    $queryCount->bindValue($key, $value);
}

$query->bindValue(':limit', $pageSize, PDO::PARAM_INT);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);

$query->execute();
$queryCount->execute();

$rows = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRows = $queryCount->fetchColumn();

$totalPages = ceil($totalRows / $pageSize);

echo $twig->render('list.twig.html', [
    'rows' => $rows,
    'rows_count' => $totalRows,
    'current_page' => $page,
    'total_pages' => $totalPages,
    'query' => htmlspecialchars($search),
    'selected_kategori' => htmlspecialchars($kategori),
    'sort' => $sortColumn,
    'order' => $sortOrder,
    'page_size' => $pageSize,
    'valid_limits' => [10, 25, 50],
]);