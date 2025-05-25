<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Historial de {{ $abonado->nombre }} {{ $abonado->apellido }}
      </h2>
      <div class="flex space-x-2">
        <a href="{{ route('abonados.index') }}"
           class="px-3 py-1 bg-gray-600 text-white rounded hover:bg-gray-700">
          Volver
        </a>
        <a href="{{ route('abonados.historial.pdf', $abonado) }}"
           class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
          Descargar PDF
        </a>
      </div>
    </div>
  </x-slot>

  <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8" x-data="{ tab: 'personal' }">
    {{-- Pestañas --}}
    <nav class="flex space-x-4 border-b mb-6">
      <button @click="tab='personal'"
              :class="tab==='personal' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600'"
              class="pb-2">Personales</button>
      <button @click="tab='tecnicos'"
              :class="tab==='tecnicos' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600'"
              class="pb-2">Técnicos</button>
      <button @click="tab='cobros'"
              :class="tab==='cobros' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600'"
              class="pb-2">Cobros</button>
      <button @click="tab='fallas'"
              :class="tab==='fallas' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600'"
              class="pb-2">Fallas</button>
    </nav>

    {{-- Contenido de pestañas --}}
    <div x-show="tab==='personal'">
      <div class="bg-white shadow rounded-lg p-6 space-y-2">
        <p><strong>Nombre:</strong> {{ $abonado->nombre }} {{ $abonado->apellido }}</p>
        <p><strong>CI:</strong> {{ $abonado->ci }}</p>
        <p><strong>Teléfono 1:</strong> {{ $abonado->telefono1 }}</p>
        <p><strong>Teléfono 2:</strong> {{ $abonado->telefono2 ?? '—' }}</p>
        <p><strong>Dirección:</strong> {{ $abonado->zona }}, {{ $abonado->calle }} #{{ $abonado->numero_casa }}</p>
        <p><strong>Fecha corte:</strong> {{ $abonado->fecha_corte?->format('Y-m-d') ?? '—' }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($abonado->estado) }}</p>
      </div>
    </div>

    <div x-show="tab==='tecnicos'">
      @if($abonado->datosTecnico)
        @php($d = $abonado->datosTecnico)
        <div class="bg-white shadow rounded-lg p-6 space-y-2">
          <p><strong>Plan:</strong> {{ $d->plan }}</p>
          <p><strong>ODN:</strong> {{ $d->odn }}</p>
          <p><strong>PON:</strong> {{ $d->pon }}</p>
          <p><strong>Password:</strong> {{ $d->password }}</p>
          <p><strong>Cód. Técnico:</strong> {{ $d->codigo_tecnico }}</p>
          <p><strong>Cód. Sistema:</strong> {{ $d->codigo_sistema }}</p>
          <p><strong>Nodo:</strong> {{ $d->nodo }}</p>
          <p><strong>Caja:</strong> {{ $d->caja_distribucion }}</p>
          <p><strong>Instalación:</strong> {{ $d->fecha_instalacion->format('Y-m-d') }}</p>
          <p><strong>Observaciones:</strong> {{ $d->observaciones ?? '—' }}</p>
          @if($d->foto_plano)
            <img src="{{ Storage::url($d->foto_plano) }}"
                 alt="Foto Plano" class="mt-4 max-h-48 border">
          @endif
        </div>
      @else
        <p class="text-gray-600">No hay datos técnicos registrados.</p>
      @endif
    </div>

    <div x-show="tab==='cobros'">
      <div class="bg-white shadow rounded-lg p-4">
        @if($abonado->cobros->isEmpty())
          <p class="text-gray-600">Sin cobros registrados.</p>
        @else
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Mes</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Año</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Día</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Monto</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($abonado->cobros as $c)
            <tr>
              <td class="px-4 py-2 text-sm text-gray-900">{{ $c->mes }}</td>
              <td class="px-4 py-2 text-sm text-gray-900">{{ $c->anio }}</td>
              <td class="px-4 py-2 text-sm text-gray-900">{{ $c->dia }}</td>
              <td class="px-4 py-2 text-sm text-gray-900">{{ number_format($c->monto,2) }}</td>
              <td class="px-4 py-2 text-sm text-gray-900">{{ ucfirst($c->estado_pago) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>

    <div x-show="tab==='fallas'">
      <div class="bg-white shadow rounded-lg p-4">
        @if($abonado->fallas->isEmpty())
          <p class="text-gray-600">Sin fallas reportadas.</p>
        @else
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Detalle</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($abonado->fallas as $f)
            <tr>
              <td class="px-4 py-2 text-sm text-gray-900">{{ ucfirst($f->tipo_falla) }}</td>
              <td class="px-4 py-2 text-sm text-gray-900">{{ $f->detalle ?? '—' }}</td>
              <td class="px-4 py-2 text-sm text-gray-900">{{ ucfirst($f->estado) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>
