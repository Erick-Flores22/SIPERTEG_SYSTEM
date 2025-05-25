<?php
// app/Models/Cobro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cobro extends Model
{
    // Si sigues convención no hace falta, pero para mayor claridad:
    protected $table = 'cobros';

    protected $fillable = [
        'abonado_id',
        'mes',
        'anio',
        'dia',
        'monto',
        'plataforma',
        'estado_pago',
    ];

    protected $casts = [
        'anio'       => 'integer',
        'dia'        => 'integer',
        'monto'      => 'decimal:2',
    ];

    /**
     * Un cobro pertenece a un abonado.
     */
    public function abonado(): BelongsTo
    {
        return $this->belongsTo(Abonado::class);
    }
}
