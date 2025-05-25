<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Defecto extends Model
{
    // Forzamos el nombre correcto de la tabla
    protected $table = 'defectos';

    protected $fillable = [
        'nombre',
        'celular',
        'direccion',
        'ubicacion',
        'detalle',
        'estado',
    ];
}
