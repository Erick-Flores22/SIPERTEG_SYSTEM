<?php

namespace App\Http\Controllers;

use App\Models\Instalacion;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
class InstalacionController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Protege todas las rutas con autenticación
        $this->middleware('auth');
    }

    /**
     * Muestra la lista paginada de instalaciones.
     */
    public function index(Request $request)
{
    $query = Instalacion::query();
    if (in_array($request->estado, ['PENDIENTE','COMPLETADA'])) {
        $query->where('estado', $request->estado);
    }
    $instalaciones = $query->orderBy('id','desc')
                           ->paginate(10)
                           ->withQueryString();
    return view('instalaciones.index', compact('instalaciones'));
}

/** Cambia el estado entre PENDIENTE y COMPLETADA */
public function toggle(Instalacion $instalacion)
{
    $instalacion->estado = $instalacion->estado === 'PENDIENTE'
                             ? 'COMPLETADA'
                             : 'PENDIENTE';
    $instalacion->save();

    return redirect()
        ->route('instalaciones.index')
        ->with('success','Estado de instalación actualizado.');
}
}
