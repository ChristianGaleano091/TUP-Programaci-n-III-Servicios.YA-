<?php
// Autoload de Composer y configuración de Eloquent
require_once __DIR__ . '/../config/db_prestadores.php';

header('Content-Type: application/json; charset=utf-8');

// Captura de URI y método
$requestUri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Normalizar la URI: quitar el prefijo de carpeta
$requestUri = str_replace('/Formulario/public', '', $requestUri);


// Router simple
switch (true) {
    case ($requestUri === '/prestadores' && $requestMethod === 'POST'):
        require __DIR__ . '/../src/routes/prestadores_route.php';
        break;

    case ($requestUri === '/prestadores' && $requestMethod === 'GET'):
        require __DIR__ . '/../src/routes/prestadores_list.php';
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