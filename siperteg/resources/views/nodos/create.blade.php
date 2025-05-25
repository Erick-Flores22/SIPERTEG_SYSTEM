{{-- resources/views/nodos/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Nodo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('nodos.store') }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                   value="{{ old('nombre') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                   required>
                            @error('nombre')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="zona" class="block text-sm font-medium text-gray-700">Zona</label>
                            <input type="text" name="zona" id="zona"
                                   value="{{ old('zona') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                   required>
                            @error('zona')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center space-x-4">
                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Guardar
                        </button>
                        <a href="{{ route('nodos.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
