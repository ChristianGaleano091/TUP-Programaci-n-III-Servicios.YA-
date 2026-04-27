<?php
header('Content-Type: application/json');

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Router
if ($requestUri === '/items' && $requestMethod === 'POST') {
    require __DIR__ . '/../src/routes/items.php';
}
elseif ($requestUri === '/services' && $requestMethod === 'POST') {
    require __DIR__ . '/../src/routes/services.php';
}
else {
    http_response_code(404);
    echo json_encode([
        "ok" => false,
        "error" => "Ruta no encontrada"
    ]);
}

