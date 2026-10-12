<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Movie.php';
require_once __DIR__ . '/controllers/MovieController.php';

// Escape dữ liệu trước khi hiển thị trong HTML.
function e($value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

// Chỉ dùng tên file, không cho truy cập ra ngoài thư mục assets.
function assetFile(string $folder, string $filename): string
{
    return 'assets/' . $folder . '/' . rawurlencode(basename($filename));
}

try {
    $db = Database::connect();
} catch (PDOException $exception) {
    error_log($exception->getMessage());

    http_response_code(500);
    exit('Không kết nối được database. Kiểm tra MySQL và config/database.php.');
}

$model = new Movie($db);
$controller = new MovieController($model);

$action = isset($_GET['act']) && is_string($_GET['act'])
    ? $_GET['act']
    : 'home';

$rawId = $_GET['id'] ?? null;

$id = is_string($rawId)
    ? filter_var($rawId, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1],
    ])
    : false;

switch ($action) {
    case 'home':
        $controller->home();
        break;

    case 'detail':
        if ($id === false) {
            $controller->notFound();
            break;
        }

        $controller->detail($id);
        break;

    case 'watch':
        if ($id === false) {
            $controller->notFound();
            break;
        }

        $controller->watch($id);
        break;

    default:
        $controller->notFound();
        break;
}