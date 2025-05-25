<?php
// app/Http/Controllers/CajaDistribucionController.php

namespace App\Http\Controllers;

use App\Models\CajaDistribucion;
use App\Models\Nodo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CajaDistribucionController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Lista paginada de cajas con su nodo */
    public function index()
    {
        $cajas = CajaDistribucion::with('nodo')
                   ->orderBy('id','desc')
                   ->paginate(10);

        return view('cajas_distribucion.index', compact('cajas'));
    }

    /** Formulario para crear */
    public function create()
    {
        $nodos = Nodo::orderBy('nombre')->get();
        return view('cajas_distribucion.create', compact('nodos'));
    }

    /** Guarda la nueva caja */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nodo_id'   => 'required|exists:nodos,id',
            'nombre'    => 'required|string|max:255',
            'zona'      => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1|max:255',
        ]);

        CajaDistribucion::create($data);

        return redirect()
            ->route('cajas_distribucion.index')
            ->with('success','Caja registrada correctamente.');
    }

    /** Formulario de edición */
    public function edit(CajaDistribucion $cajas_distribucion)
    {
        $nodos = Nodo::orderBy('nombre')->get();
        return view('cajas_distribucion.edit', compact('cajas_distribucion','nodos'));
    }

    /** Actualiza la caja */
    public function update(Request $request, CajaDistribucion $cajas_distribucion)
    {
        $data = $request->validate([
            'nodo_id'   => 'required|exists:nodos,id',
            'nombre'    => 'required|string|max:255',
            'zona'      => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1|max:255',
        ]);

        $cajas_distribucion->update($data);

        return redirect()
            ->route('cajas_distribucion.index')
            ->with('success','Caja actualizada correctamente.');
    }

    /** Elimina la caja */
    public function destroy(CajaDistribucion $cajas_distribucion)
    {
        $cajas_distribucion->delete();

        return redirect()
            ->route('cajas_distribucion.index')
            ->with('success','Caja eliminada correctamente.');
    }
}