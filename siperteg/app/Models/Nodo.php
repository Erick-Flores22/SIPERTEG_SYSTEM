<?php
// app/Models/Nodo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{
    protected $fillable = [
        'nombre',
        'zona',
    ];
}
