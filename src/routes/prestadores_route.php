<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once __DIR__ . '/../../config/db_prestadores.php';
require_once __DIR__ . '/../validators/prestador_validator.php';

use Usuario\Formulario\Models\prestador;

header('Content-Type: application/json; charset=utf-8');

// Validación
$validator = new prestador_validator($_POST);
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
$newPrestador = prestador::create([
    "name"         => htmlspecialchars(trim($_POST['name'])),
    "description"  => htmlspecialchars(trim($_POST['description'])),
    "category"     => $_POST['category'],
    "location"     => htmlspecialchars(trim($_POST['location'])),
    "email"        => $_POST['email'],
    "password"     => password_hash($_POST['password'], PASSWORD_DEFAULT),
    "phone"        => $_POST['phone'],
    "user_name"    => htmlspecialchars(trim($_POST['user_name'])),
    "dni"          => $_POST['dni'],
    "created_date" => date("Y-m-d"),
    "created_time" => date("H:i")
    /* "price"        => (float)$_POST['price'],
    "birth_date"   => $_POST['birth_date'], */
]);

http_response_code(201);
echo json_encode([
    "ok" => true,
    "prestador" => $newPrestador
]);