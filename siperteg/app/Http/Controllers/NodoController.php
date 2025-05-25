<?php
// app/Http/Controllers/NodoController.php

namespace App\Http\Controllers;

use App\Models\Nodo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class NodoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nodos = Nodo::orderBy('id', 'desc')->paginate(10);
        return view('nodos.index', compact('nodos'));
    }

    public function create()
    {
        return view('nodos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'zona'   => 'required|string|max:255',
        ]);

        Nodo::create($data);

        return redirect()
            ->route('nodos.index')
            ->with('success', 'Nodo creado correctamente.');
    }

    public function edit(Nodo $nodo)
    {
        return view('nodos.edit', compact('nodo'));
    }

    public function update(Request $request, Nodo $nodo)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'zona'   => 'required|string|max:255',
        ]);

        $nodo->update($data);

        return redirect()
            ->route('nodos.index')
            ->with('success', 'Nodo actualizado correctamente.');
    }

    public function destroy(Nodo $nodo)
    {
        $nodo->delete();

        return redirect()
            ->route('nodos.index')
            ->with('success', 'Nodo eliminado correctamente.');
    }
}
