<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';
require_once __DIR__ . '/../validators/cliente_validator.php';

use Usuario\Formulario\Models\cliente;

header('Content-Type: application/json; charset=utf-8');

// Se espera email + password
if (empty($_POST['email']) || empty($_POST['password'])) {
    http_response_code(400);
    echo json_encode([
        "ok" => false,
        "error" => "Email y contraseña son obligatorios"
    ]);
    exit;
}

try {
    $cliente = cliente::where('email', $_POST['email'])->first();

    if (!$cliente || !password_verify($_POST['password'], $cliente->password)) {
        http_response_code(401);
        echo json_encode([
            "ok" => false,
            "error" => "Credenciales inválidas"
        ]);
        exit;
    }

    http_response_code(200);
    echo json_encode([
        "ok" => true,
        "cliente" => [
            "id" => $cliente->id,
            "name" => $cliente->name,
            "email" => $cliente->email,
            "phone" => $cliente->phone,
            "location" => $cliente->location,
        ]
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "ok" => false,
        "error" => "Error interno: " . $e->getMessage()
    ]);
}
