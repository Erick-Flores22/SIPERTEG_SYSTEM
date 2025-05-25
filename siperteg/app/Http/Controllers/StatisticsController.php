<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Abonado;
use App\Models\Cobro;
use App\Models\Falla;
use App\Models\Instalacion;
use App\Models\Defecto;

class StatisticsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Abonados
        $abonadosRaw = Abonado::selectRaw('estado, COUNT(*) as count')
                              ->groupBy('estado')
                              ->pluck('count','estado');
        $abonadosLabels = $abonadosRaw->keys()->toArray();
        $abonadosData   = $abonadosRaw->values()->toArray();

        // Cobros
        $cobrosRaw = Cobro::selectRaw('estado_pago, COUNT(*) as count')
                          ->groupBy('estado_pago')
                          ->pluck('count','estado_pago');
        $cobrosLabels = $cobrosRaw->keys()->toArray();
        $cobrosData   = $cobrosRaw->values()->toArray();

        // Fallas
        $fallasRaw = Falla::selectRaw('estado, COUNT(*) as count')
                          ->groupBy('estado')
                          ->pluck('count','estado');
        $fallasLabels = $fallasRaw->keys()->toArray();
        $fallasData   = $fallasRaw->values()->toArray();

        // Instalaciones
        $instRaw = Instalacion::selectRaw('estado, COUNT(*) as count')
                              ->groupBy('estado')
                              ->pluck('count','estado');
        $instLabels = $instRaw->keys()->toArray();
        $instData   = $instRaw->values()->toArray();

        // Defectos
        $defRaw = Defecto::selectRaw('estado, COUNT(*) as count')
                         ->groupBy('estado')
                         ->pluck('count','estado');
        $defLabels = $defRaw->keys()->toArray();
        $defData   = $defRaw->values()->toArray();

        return view('estadisticas.index', compact(
            'abonadosLabels','abonadosData',
            'cobrosLabels','cobrosData',
            'fallasLabels','fallasData',
            'instLabels','instData',
            'defLabels','defData'
        ));
    }
}
