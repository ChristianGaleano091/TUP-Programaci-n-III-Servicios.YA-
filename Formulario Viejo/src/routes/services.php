<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once __DIR__ . '/../validators/ServiceValidator.php';

header('Content-Type: application/json');

$validator = new ServiceValidator($_POST);
$errors = $validator->validate();

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        "ok" => false,
        "errors" => $errors
    ]);
    exit;
}

// Si pasa las validaciones, armamos el objeto
$newService = [
    "id" => rand(1, 1000),
    "name" => htmlspecialchars(trim($_POST['name'])),
    "description" => htmlspecialchars(trim($_POST['description'])),
    "category" => $_POST['category'],
    "price" => (float)$_POST['price'],
    "birth_date" => $_POST['birth_date'], // fecha de nacimiento del usuario
    "location" => htmlspecialchars(trim($_POST['location'])),
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "user_name" => htmlspecialchars(trim($_POST['user_name'])),
    "dni" => $_POST['dni'],
    "created_date" => date("Y-m-d"),       // fecha automática
    "created_time" => date("H:i"),         // hora automática
];

http_response_code(201);
echo json_encode([
    "ok" => true,
    "service" => $newService
]);
