<?php
namespace Usuario\Formulario\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model {
    protected $table = 'clientes';
    protected $fillable = [
        'name',
        'dni',
        'location',
        'email',
        'password',
        'phone',
        'created_date',
        'created_time'
    ];

    public $timestamps = false;
}
