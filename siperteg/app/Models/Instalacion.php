<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    // Forzamos el nombre correcto de la tabla:
    protected $table = 'instalaciones';

    protected $fillable = [
        'nombre',
        'celular',
        'direccion',
        'ubicacion',
        'estado',
    ];
}
