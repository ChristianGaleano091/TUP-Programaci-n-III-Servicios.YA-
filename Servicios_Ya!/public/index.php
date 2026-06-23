<?php
// Autoload de Composer y configuración de Eloquent
require_once __DIR__ . '/../config/db_prestadores.php';

ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');

set_exception_handler(function ($exception) {
    http_response_code(500);
    echo json_encode([
        'ok' => false,
        'error' => 'Error interno del servidor: ' . $exception->getMessage()
    ]);
    exit;
});

register_shutdown_function(function () {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR], true)) {
        http_response_code(500);
        echo json_encode([
            'ok' => false,
            'error' => 'Error fatal del servidor: ' . ($error['message'] ?? 'Error desconocido')
        ]);
    }
});

// Captura de URI y método
$requestUri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Normalizar la URI: quitar el prefijo de carpeta y el posible index.php
$requestUri = str_replace('/Formulario/public', '', $requestUri);
$requestUri = str_replace('/index.php', '', $requestUri);
$requestUri = rtrim($requestUri, '/');
if ($requestUri === '') {
    $requestUri = '/';
}

// Router simple
switch (true) {
    case ($requestUri === '/prestadores' && $requestMethod === 'POST'):
        require __DIR__ . '/../src/routes/prestadores_route.php';
        break;

    case ($requestUri === '/prestadores' && $requestMethod === 'GET'):
        require __DIR__ . '/../src/routes/prestadores_list.php';
        break;

    case ($requestUri === '/login' && $requestMethod === 'POST'):
        require __DIR__ . '/../src/routes/login_route.php';
        break;

    case ($requestUri === '/reservas' && $requestMethod === 'GET'):
        require __DIR__ . '/../src/routes/reservas_list.php';
        break;

    case ($requestUri === '/reservas/cancel' && $requestMethod === 'POST'):
        require __DIR__ . '/../src/routes/reservas_cancel.php';
        break;

    case ($requestUri === '/reservas' && $requestMethod === 'POST'):
        require __DIR__ . '/../src/routes/reservas_route.php';
        break;

    case ($requestUri === '/clientes' && $requestMethod === 'POST'):
        require __DIR__ . '/../src/routes/clientes_route.php';
        break;

    default:
        http_response_code(404);
        echo json_encode([
            "ok"    => false,
            "error" => "Ruta no encontrada"
        ]);
        break;
}