<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';

use Usuario\Formulario\Models\reserva;
use Usuario\Formulario\Models\prestador;

header('Content-Type: application/json; charset=utf-8');

// Datos esperados: client_id, service_name, category, scheduled_date, scheduled_time
$required = ['client_id', 'service_name', 'scheduled_date', 'scheduled_time'];
$errors = [];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        $errors[$field] = 'Este campo es obligatorio';
    }
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'errors' => $errors]);
    exit;
}

$clienteId = intval($_POST['client_id']);
$prestadorId = isset($_POST['prestador_id']) && intval($_POST['prestador_id']) > 0 ? intval($_POST['prestador_id']) : 1;
$serviceName = htmlspecialchars(trim($_POST['service_name']));
$bookedDate = $_POST['scheduled_date'];
$bookedTime = $_POST['scheduled_time'];
if (strpos($bookedTime, ' - ') !== false) {
    $bookedTime = explode(' - ', $bookedTime)[0];
}
$bookedTime = trim($bookedTime);

try {
    $newReserva = reserva::create([
        'cliente_id' => $clienteId,
        'prestador_id' => $prestadorId,
        'service_name' => $serviceName,
        'booked_date' => $bookedDate,
        'booked_time' => $bookedTime,
        'status' => 'confirmado'
    ]);

    http_response_code(201);
    echo json_encode(['ok' => true, 'reserva' => $newReserva]);
} catch (Throwable $e) {
    http_response_code(500);
    $schema = [];
    try {
        $pdo = $capsule->getConnection()->getPdo();
        $stmt = $pdo->query('SHOW COLUMNS FROM reservas');
        $schema = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Throwable $schemaException) {
        $schema = ['error' => 'No se pudo obtener el esquema de la tabla reservas: ' . $schemaException->getMessage()];
    }

    echo json_encode([
        'ok' => false,
        'error' => 'Error al crear la reserva: ' . $e->getMessage(),
        'table_schema' => $schema
    ]);
}
