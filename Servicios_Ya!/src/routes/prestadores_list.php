<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';

use Usuario\Formulario\Models\prestador;

header('Content-Type: application/json; charset=utf-8');

try {
    $prestadores = prestador::all();
    http_response_code(200);
    echo json_encode([
        "ok" => true,
        "prestadores" => $prestadores
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "ok" => false,
        "error" => "Error al obtener los prestadores: " . $e->getMessage()
    ]);
}