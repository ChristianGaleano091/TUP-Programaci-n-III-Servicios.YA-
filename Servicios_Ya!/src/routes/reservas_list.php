<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';

use Usuario\Formulario\Models\reserva;

header('Content-Type: application/json; charset=utf-8');

$clienteId = isset($_GET['cliente_id']) ? intval($_GET['cliente_id']) : 0;
if ($clienteId <= 0) {
    http_response_code(400);
    echo json_encode([
        'ok' => false,
        'error' => 'cliente_id es obligatorio'
    ]);
    exit;
}

try {
    $reservas = reserva::with('prestador')->where('cliente_id', $clienteId)
        ->orderBy('booked_date', 'desc')
        ->orderBy('booked_time', 'desc')
        ->get();

    http_response_code(200);
    echo json_encode([
        'ok' => true,
        'reservas' => $reservas
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'ok' => false,
        'error' => 'Error al obtener las reservas: ' . $e->getMessage()
    ]);
}
