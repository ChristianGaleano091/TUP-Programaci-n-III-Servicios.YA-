<?php
namespace Usuario\Formulario\Models;

use Illuminate\Database\Eloquent\Model;

class reserva extends Model {
    protected $table = 'reservas';
    protected $fillable = [
        'client_id',
        'prestador_name',
        'service_name',
        'category',
        'scheduled_date',
        'scheduled_time',
        'status',
        'created_date',
        'created_time'
    ];

    public $timestamps = false;
}
