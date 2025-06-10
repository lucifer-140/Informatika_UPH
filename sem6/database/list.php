<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$buildQueryFunction = new TwigFunction('buildQuery', function($newParams = []) {
    $currentParams = $_GET;
    $mergedParams = array_merge($currentParams, $newParams);
    return http_build_query($mergedParams);
});
$twig->addFunction($buildQueryFunction);

$db = DB::getDB();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$sortOrder = isset($_GET['order']) && in_array(strtolower($_GET['order']), ['asc', 'desc']) ? $_GET['order'] : 'asc';

$page = max(1, $page);
$limit = 10;
$offset = ($page - 1) * $limit;

$conditions = [];
$params = [];

if (!empty($search)) {
    $conditions[] = "task LIKE :search";
    $params[':search'] = '%' . $search . '%';
}

if (!empty($status)) {
    $conditions[] = "status = :status";
    $params[':status'] = $status;
}

$whereClause = !empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

$sql = "SELECT * FROM todo $whereClause ORDER BY $sortColumn $sortOrder LIMIT :limit OFFSET :offset";
$sqlCount = "SELECT COUNT(*) FROM todo $whereClause";

$query = $db->prepare($sql);
$queryCount = $db->prepare($sqlCount);

foreach ($params as $key => $value) {
    $query->bindValue($key, $value);
    $queryCount->bindValue($key, $value);
}


$query->bindValue(':limit', $limit, PDO::PARAM_INT);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);

$query->execute();
$queryCount->execute();

$rows = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRows = $queryCount->fetchColumn();


$totalPages = ceil($totalRows / $limit);

echo $twig->render('list.twig.html', [
    'rows' => $rows,
    'rows_count' => $totalRows,
    'current_page' => $page,
    'total_pages' => $totalPages,
    'query' => htmlspecialchars($search),
    'selected_status' => htmlspecialchars($status),
    'sort' => $sortColumn,
    'order' => $sortOrder,
]);