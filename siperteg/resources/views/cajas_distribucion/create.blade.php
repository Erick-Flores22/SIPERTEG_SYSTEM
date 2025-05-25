{{-- resources/views/cajas_distribucion/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar Nueva Caja
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('cajas_distribucion.store') }}" method="POST">
                    @csrf

                    {{-- Selección de Nodo --}}
                    <div class="mb-4">
                        <label for="nodo_id" class="block text-sm font-medium text-gray-700">Nodo</label>
                        <select name="nodo_id" id="nodo_id" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Seleccione un nodo --</option>
                            @foreach($nodos as $nodo)
                                <option value="{{ $nodo->id }}"
                                    {{ old('nodo_id') == $nodo->id ? 'selected' : '' }}>
                                    {{ $nodo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('nodo_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                               value="{{ old('nombre') }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nombre')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Zona --}}
                    <div class="mb-4">
                        <label for="zona" class="block text-sm font-medium text-gray-700">Zona</label>
                        <input type="text" name="zona" id="zona"
                               value="{{ old('zona') }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('zona')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Capacidad --}}
                    <div class="mb-4">
                        <label for="capacidad" class="block text-sm font-medium text-gray-700">Capacidad</label>
                        <input type="number" name="capacidad" id="capacidad"
                               value="{{ old('capacidad', 16) }}"
                               min="1" max="255" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('capacidad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Guardar
                        </button>
                        <a href="{{ route('cajas_distribucion.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
