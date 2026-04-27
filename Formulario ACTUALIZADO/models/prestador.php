<?php
namespace Usuario\Formulario\Models;

use Illuminate\Database\Eloquent\Model;

class prestador extends Model {
    protected $table = 'prestadores';
    protected $fillable = [
        'name',
        'description',
        'category',
        'location',
        'email',
        'password',
        'phone',
        'user_name',
        'dni',
        'created_date',
        'created_time'
        /* 'price',
        'birth_date', */
    ];

    public $timestamps = false;

}