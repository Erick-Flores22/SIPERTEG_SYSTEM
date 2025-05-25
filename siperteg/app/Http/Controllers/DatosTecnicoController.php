<?php

namespace App\Http\Controllers;

use App\Models\DatosTecnico;
use App\Models\Abonado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class DatosTecnicoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $abonados = Abonado::orderBy('nombre')->get();
        return view('datos_tecnicos.create', compact('abonados'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'abonado_id'        => 'required|exists:abonados,id',
            'plan'              => 'required|string|max:255',
            'odn'               => 'required|string|max:255',
            'pon'               => 'required|string|max:255',
            'password'          => 'required|string|max:255',
            'codigo_tecnico'    => 'required|string|max:255',
            'codigo_sistema'    => 'required|string|max:255',
            'nodo'              => 'required|string|max:255',
            'caja_distribucion' => 'required|string|max:255',
            'fecha_instalacion' => 'required|date',
            'foto_plano'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'observaciones'     => 'nullable|string',
            'mapa_link'         => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('foto_plano')) {
            $data['foto_plano'] = $request->file('foto_plano')
                ->store('foto_planos', 'public');
        }

        DatosTecnico::create($data);

        return redirect()
            ->route('abonados.index')
            ->with('success', 'Datos técnicos registrados correctamente.');
    }

    public function edit(DatosTecnico $datos_tecnico)
    {
        $abonados = Abonado::orderBy('nombre')->get();
        return view('datos_tecnicos.edit', compact('datos_tecnico', 'abonados'));
    }

    public function update(Request $request, DatosTecnico $datos_tecnico)
    {
        $data = $request->validate([
            'abonado_id'        => 'required|exists:abonados,id',
            'plan'              => 'required|string|max:255',
            'odn'               => 'required|string|max:255',
            'pon'               => 'required|string|max:255',
            'password'          => 'required|string|max:255',
            'codigo_tecnico'    => 'required|string|max:255',
            'codigo_sistema'    => 'required|string|max:255',
            'nodo'              => 'required|string|max:255',
            'caja_distribucion' => 'required|string|max:255',
            'fecha_instalacion' => 'required|date',
            'foto_plano'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'observaciones'     => 'nullable|string',
            'mapa_link'         => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('foto_plano')) {
            if ($datos_tecnico->foto_plano && Storage::disk('public')->exists($datos_tecnico->foto_plano)) {
                Storage::disk('public')->delete($datos_tecnico->foto_plano);
            }
            $data['foto_plano'] = $request->file('foto_plano')
                ->store('foto_planos', 'public');
        }

        $datos_tecnico->update($data);

        return redirect()
            ->route('abonados.index')
            ->with('success', 'Datos técnicos actualizados correctamente.');
    }

    public function destroy(DatosTecnico $datos_tecnico)
    {
        if ($datos_tecnico->foto_plano && Storage::disk('public')->exists($datos_tecnico->foto_plano)) {
            Storage::disk('public')->delete($datos_tecnico->foto_plano);
        }
        $datos_tecnico->delete();

        return redirect()
            ->route('abonados.index')
            ->with('success', 'Datos técnicos eliminados correctamente.');
    }
}
