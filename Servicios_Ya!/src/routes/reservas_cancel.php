<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';

use Usuario\Formulario\Models\reserva;

header('Content-Type: application/json; charset=utf-8');

if (empty($_POST['reserva_id'])) {
    http_response_code(400);
    echo json_encode([
        'ok' => false,
        'error' => 'reserva_id es obligatorio'
    ]);
    exit;
}

try {
    $reserva = reserva::find(intval($_POST['reserva_id']));
    if (!$reserva) {
        http_response_code(404);
        echo json_encode([
            'ok' => false,
            'error' => 'Reserva no encontrada'
        ]);
        exit;
    }

    $reserva->status = 'cancelado';
    $reserva->save();

    echo json_encode([
        'ok' => true,
        'reserva' => $reserva
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'ok' => false,
        'error' => 'Error al cancelar la reserva: ' . $e->getMessage()
    ]);
}
