<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar Nueva Falla
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('fallas.store') }}" method="POST">
                    @csrf

                    {{-- Abonado --}}
                    <div class="mb-4">
                        <label for="abonado_id" class="block text-sm font-medium text-gray-700">Abonado</label>
                        <select name="abonado_id" id="abonado_id" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Seleccione un abonado --</option>
                            @foreach($abonados as $abonado)
                                <option value="{{ $abonado->id }}"
                                    {{ old('abonado_id') == $abonado->id ? 'selected' : '' }}>
                                    {{ $abonado->nombre }} {{ $abonado->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('abonado_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Tipo de Falla --}}
                    <div class="mb-4">
                        <label for="tipo_falla" class="block text-sm font-medium text-gray-700">Tipo de Falla</label>
                        <select name="tipo_falla" id="tipo_falla" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="material" {{ old('tipo_falla')=='material' ? 'selected':'' }}>Material</option>
                            <option value="caja"     {{ old('tipo_falla')=='caja'     ? 'selected':'' }}>Caja</option>
                        </select>
                        @error('tipo_falla')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Detalle --}}
                    <div class="mb-4">
                        <label for="detalle" class="block text-sm font-medium text-gray-700">Detalle</label>
                        <input type="text" name="detalle" id="detalle"
                               value="{{ old('detalle') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('detalle')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Estado --}}
                    <div class="mb-4">
                        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="estado" id="estado" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="pendiente" {{ old('estado')=='pendiente' ? 'selected':'' }}>Pendiente</option>
                            <option value="resuelta"  {{ old('estado')=='resuelta'  ? 'selected':'' }}>Resuelta</option>
                        </select>
                        @error('estado')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Guardar
                        </button>
                        <a href="{{ route('fallas.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
