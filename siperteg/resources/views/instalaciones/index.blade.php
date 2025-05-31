{{-- resources/views/instalaciones/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Instalaciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Controles: Volver y filtro de estado --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 space-y-2 md:space-y-0">
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Volver
                </a>

                <form method="GET" action="{{ route('instalaciones.index') }}" class="flex space-x-2">
                    <select name="estado"
                            class="px-3 py-2 border border-gray-300 rounded">
                        <option value="">Todos los estados</option>
                        <option value="PENDIENTE"  {{ request('estado')=='PENDIENTE'  ? 'selected':'' }}>Pendiente</option>
                        <option value="COMPLETADA" {{ request('estado')=='COMPLETADA' ? 'selected':'' }}>Completada</option>
                    </select>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Filtrar
                    </button>
                </form>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabla --}}
            <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Celular</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($instalaciones as $instalacion)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $instalacion->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $instalacion->celular }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $instalacion->direccion }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $instalacion->ubicacion }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ucfirst(strtolower($instalacion->estado)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-y-1">
                                <form action="{{ route('instalaciones.toggle', $instalacion) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        {{ $instalacion->estado === 'PENDIENTE' ? 'M/Completada' : 'M/Pendiente' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $instalaciones->appends(request()->only('estado'))->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
