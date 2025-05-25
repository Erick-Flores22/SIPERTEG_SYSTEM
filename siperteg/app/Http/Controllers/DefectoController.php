<?php

namespace App\Http\Controllers;

use App\Models\Defecto;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
class DefectoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Protege todas las acciones tras login
        $this->middleware('auth');
    }

    /**
     * Muestra el listado paginado de defectos.
     */
    public function index(Request $request)
{
    $query = Defecto::query();
    if ($estado = $request->input('estado')) {
        $query->where('estado', $estado);
    }
    $defectos = $query->orderBy('id','desc')
                      ->paginate(10)
                      ->withQueryString();
    return view('defectos.index', compact('defectos'));
}

/** Alterna entre PENDIENTE y RESUELTA */
public function toggle(Defecto $defecto)
{
    $defecto->estado = $defecto->estado === 'PENDIENTE' ? 'RESUELTA' : 'PENDIENTE';
    $defecto->save();
    return redirect()->route('defectos.index')
                     ->with('success','Estado actualizado.');
}

}
