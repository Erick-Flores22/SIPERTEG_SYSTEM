{{-- resources/views/cobros/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Cobro
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('cobros.update', $cobro) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Abonado --}}
                    <div class="mb-4">
                        <label for="abonado_id" class="block text-sm font-medium text-gray-700">Abonado</label>
                        <select name="abonado_id" id="abonado_id" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($abonados as $abonado)
                                <option value="{{ $abonado->id }}"
                                    {{ old('abonado_id', $cobro->abonado_id)==$abonado->id?'selected':'' }}>
                                    {{ $abonado->nombre }} {{ $abonado->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('abonado_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Mes --}}
                    <div class="mb-4">
                        <label for="mes" class="block text-sm font-medium text-gray-700">Mes</label>
                        <input type="text" name="mes" id="mes"
                               value="{{ old('mes', $cobro->mes) }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('mes')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Año --}}
                    <div class="mb-4">
                        <label for="anio" class="block text-sm font-medium text-gray-700">Año</label>
                        <input type="number" name="anio" id="anio"
                               value="{{ old('anio', $cobro->anio) }}"
                               min="1900" max="{{ date('Y') }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('anio')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Día --}}
                    <div class="mb-4">
                        <label for="dia" class="block text-sm font-medium text-gray-700">Día</label>
                        <input type="number" name="dia" id="dia"
                               value="{{ old('dia', $cobro->dia) }}"
                               min="1" max="31" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('dia')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Monto --}}
                    <div class="mb-4">
                        <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
                        <input type="text" name="monto" id="monto"
                               value="{{ old('monto', $cobro->monto) }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('monto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Plataforma --}}
                    <div class="mb-4">
                        <label for="plataforma" class="block text-sm font-medium text-gray-700">Plataforma</label>
                        <input type="text" name="plataforma" id="plataforma"
                               value="{{ old('plataforma', $cobro->plataforma) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('plataforma')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Estado de Pago --}}
                    <div class="mb-4">
                        <label for="estado_pago" class="block text-sm font-medium text-gray-700">Estado de Pago</label>
                        <select name="estado_pago" id="estado_pago"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="pendiente" {{ old('estado_pago', $cobro->estado_pago)=='pendiente'?'selected':'' }}>
                                Pendiente
                            </option>
                            <option value="pagado" {{ old('estado_pago', $cobro->estado_pago)=='pagado'?'selected':'' }}>
                                Pagado
                            </option>
                        </select>
                        @error('estado_pago')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit"
                                class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
                            Actualizar
                        </button>
                        <a href="{{ route('cobros.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
