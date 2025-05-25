<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatosTecnico extends Model
{
    protected $table = 'datos_tecnicos';

    protected $fillable = [
        'abonado_id',
        'plan',
        'odn',
        'pon',
        'password',
        'codigo_tecnico',
        'codigo_sistema',
        'nodo',
        'caja_distribucion',
        'fecha_instalacion',
        'foto_plano',
        'observaciones',
        'mapa_link',
    ];

    protected $casts = [
        'fecha_instalacion' => 'date',
    ];

    /**
     * Relación con abonado.
     */
    public function abonado(): BelongsTo
    {
        return $this->belongsTo(Abonado::class);
    }
}