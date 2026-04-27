<?php
// Autoload de Composer: carga todas las librerías instaladas en vendor
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Inicialización de Eloquent
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',        // mejor usar 127.0.0.1 en lugar de "localhost"
    'database'  => 'items_db',         // nombre de tu base de datos
    'username'  => 'root',
    'password'  => '',                 // si tu MySQL tiene contraseña, ponela acá
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Hacer que Eloquent esté disponible globalmente
$capsule->setAsGlobal();
$capsule->bootEloquent();