{{-- resources/views/cajas_distribucion/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Cajas de Distribución
        </h2>
    </x-slot>

    <div class="py-12">
    <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Volver
                </a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('cajas_distribucion.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Nueva Caja
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nodo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zona</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capacidad</th>
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($cajas as $caja)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $caja->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $caja->nodo->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $caja->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $caja->zona }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $caja->capacidad }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 space-x-2">
                                
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $cajas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
