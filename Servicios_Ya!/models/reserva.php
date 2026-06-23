<?php
namespace Usuario\Formulario\Models;

use Illuminate\Database\Eloquent\Model;

class reserva extends Model {
    protected $table = 'reservas';
    protected $fillable = [
        'cliente_id',
        'prestador_id',
        'service_name',
        'booked_date',
        'booked_time',
        'status'
    ];

    public $timestamps = true;

    public function prestador() {
        return $this->belongsTo(prestador::class, 'prestador_id');
    }
}
