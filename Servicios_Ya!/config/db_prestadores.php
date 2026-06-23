<?php
// Autoload de Composer: carga todas las librerías instaladas en vendor
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Inicialización de Eloquent
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'port'      => 3306,
    'database'  => 'servicios_ya',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Hacer que Eloquent esté disponible globalmente
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Forzar el uso de la base de datos correcta
try {
    $capsule->getConnection()->getPdo()->exec('USE servicios_ya');
} catch (Exception $e) {
    // Si no se puede forzar aquí, la conexión seguirá usando la base configurada
}
