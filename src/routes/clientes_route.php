<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';
require_once __DIR__ . '/../validators/cliente_validator.php';

use Usuario\Formulario\Models\cliente;

header('Content-Type: application/json; charset=utf-8');

// Validación
$validator = new cliente_validator($_POST);
$errors = $validator->validate();

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        "ok" => false,
        "errors" => $errors
    ]);
    exit;
}

// Inserción en la DB
$newCliente = cliente::create([
    "name"         => htmlspecialchars(trim($_POST['name'])),
    "dni"          => $_POST['dni'],
    "location"     => htmlspecialchars(trim($_POST['location'])),
    "email"        => $_POST['email'],
    "password"     => password_hash($_POST['password'], PASSWORD_DEFAULT),
    "phone"        => $_POST['phone'],
    "created_date" => date("Y-m-d"),
    "created_time" => date("H:i")
]);

http_response_code(201);
echo json_encode([
    "ok" => true,
    "cliente" => $newCliente
]);
