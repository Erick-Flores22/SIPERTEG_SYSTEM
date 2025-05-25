{{-- resources/views/cobros/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Cobros
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Controles: Volver, Filtro y Nuevo Cobro --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 space-y-2 md:space-y-0">
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Volver
                </a>

                <form method="GET" action="{{ route('cobros.index') }}" class="flex space-x-2">
                    <select name="estado_pago"
                            class="px-3 py-2 border border-gray-300 rounded">
                        <option value="">Todos</option>
                        <option value="pagado"    {{ request('estado_pago')=='pagado'    ? 'selected':'' }}>Pagado</option>
                        <option value="pendiente" {{ request('estado_pago')=='pendiente' ? 'selected':'' }}>Pendiente</option>
                    </select>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Filtrar
                    </button>
                </form>

                <a href="{{ route('cobros.create') }}"
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Nuevo Cobro
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Abonado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mes</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Día</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plataforma</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($cobros as $cobro)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cobro->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $cobro->abonado->nombre }} {{ $cobro->abonado->apellido }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cobro->mes }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cobro->anio }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cobro->dia }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($cobro->monto,2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cobro->plataforma ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ucfirst($cobro->estado_pago) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                <a href="{{ route('cobros.edit', $cobro) }}"
                                   class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $cobros->appends(request()->only('estado_pago'))->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
