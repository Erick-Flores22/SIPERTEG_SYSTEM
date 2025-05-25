<?php

namespace App\Http\Controllers;

use App\Models\Cobro;
use App\Models\Abonado;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CobroController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
{
    $query = Cobro::with('abonado');

    if ($estado = $request->input('estado_pago')) {
        $query->where('estado_pago', $estado);
    }

    $cobros = $query->orderBy('id', 'desc')
                    ->paginate(10)
                    ->withQueryString();

    return view('cobros.index', compact('cobros'));
}


    public function create()
    {
        $abonados = Abonado::orderBy('nombre')->get();
        return view('cobros.create', compact('abonados'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'abonado_id'  => 'required|exists:abonados,id',
            'mes'         => 'required|string|max:255',
            'anio'        => 'required|digits:4|integer',
            'dia'         => 'required|integer|min:1|max:31',
            'monto'       => 'required|numeric|min:0',
            'plataforma'  => 'nullable|string|max:255',
            'estado_pago' => 'required|in:pagado,pendiente',
        ]);

        Cobro::create($data);

        return redirect()
            ->route('cobros.index')
            ->with('success', 'Cobro registrado correctamente.');
    }

    public function edit(Cobro $cobro)
    {
        $abonados = Abonado::orderBy('nombre')->get();
        return view('cobros.edit', compact('cobro','abonados'));
    }

    public function update(Request $request, Cobro $cobro)
    {
        $data = $request->validate([
            'abonado_id'  => 'required|exists:abonados,id',
            'mes'         => 'required|string|max:255',
            'anio'        => 'required|digits:4|integer',
            'dia'         => 'required|integer|min:1|max:31',
            'monto'       => 'required|numeric|min:0',
            'plataforma'  => 'nullable|string|max:255',
            'estado_pago' => 'required|in:pagado,pendiente',
        ]);

        $cobro->update($data);

        return redirect()
            ->route('cobros.index')
            ->with('success', 'Cobro actualizado correctamente.');
    }

    public function destroy(Cobro $cobro)
    {
        $cobro->delete();

        return redirect()
            ->route('cobros.index')
            ->with('success', 'Cobro eliminado correctamente.');
    }
}
