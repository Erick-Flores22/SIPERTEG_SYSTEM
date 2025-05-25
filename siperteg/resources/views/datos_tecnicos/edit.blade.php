<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Editar Datos Técnicos
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow sm:rounded-lg p-6">
        <form action="{{ route('datos_tecnicos.update', $datos_tecnico) }}"
              method="POST"
              enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Abonado --}}
            <div>
              <label for="abonado_id" class="block text-sm font-medium text-gray-700">Abonado</label>
              <select name="abonado_id" id="abonado_id" required
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @foreach($abonados as $abonado)
                  <option value="{{ $abonado->id }}"
                    {{ old('abonado_id', $datos_tecnico->abonado_id) == $abonado->id ? 'selected' : '' }}>
                    {{ $abonado->nombre }} {{ $abonado->apellido }}
                  </option>
                @endforeach
              </select>
              @error('abonado_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Plan --}}
            <div>
              <label for="plan" class="block text-sm font-medium text-gray-700">Plan</label>
              <input type="text" name="plan" id="plan"
                     value="{{ old('plan', $datos_tecnico->plan) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('plan')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- ODN --}}
            <div>
              <label for="odn" class="block text-sm font-medium text-gray-700">ODN</label>
              <input type="text" name="odn" id="odn"
                     value="{{ old('odn', $datos_tecnico->odn) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('odn')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- PON --}}
            <div>
              <label for="pon" class="block text-sm font-medium text-gray-700">PON</label>
              <input type="text" name="pon" id="pon"
                     value="{{ old('pon', $datos_tecnico->pon) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('pon')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Password --}}
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <input type="text" name="password" id="password"
                     value="{{ old('password', $datos_tecnico->password) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Código Técnico --}}
            <div>
              <label for="codigo_tecnico" class="block text-sm font-medium text-gray-700">Código Técnico</label>
              <input type="text" name="codigo_tecnico" id="codigo_tecnico"
                     value="{{ old('codigo_tecnico', $datos_tecnico->codigo_tecnico) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('codigo_tecnico')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Código Sistema --}}
            <div>
              <label for="codigo_sistema" class="block text-sm font-medium text-gray-700">Código Sistema</label>
              <input type="text" name="codigo_sistema" id="codigo_sistema"
                     value="{{ old('codigo_sistema', $datos_tecnico->codigo_sistema) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('codigo_sistema')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Nodo --}}
            <div>
              <label for="nodo" class="block text-sm font-medium text-gray-700">Nodo</label>
              <input type="text" name="nodo" id="nodo"
                     value="{{ old('nodo', $datos_tecnico->nodo) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('nodo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Caja Distribución --}}
            <div>
              <label for="caja_distribucion" class="block text-sm font-medium text-gray-700">Caja Distribución</label>
              <input type="text" name="caja_distribucion" id="caja_distribucion"
                     value="{{ old('caja_distribucion', $datos_tecnico->caja_distribucion) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('caja_distribucion')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Fecha Instalación --}}
            <div>
              <label for="fecha_instalacion" class="block text-sm font-medium text-gray-700">Fecha de Instalación</label>
              <input type="date" name="fecha_instalacion" id="fecha_instalacion"
                     value="{{ old('fecha_instalacion', $datos_tecnico->fecha_instalacion->format('Y-m-d')) }}" required
                     class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              @error('fecha_instalacion')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Foto Plano --}}
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-gray-700">Foto Plano Actual</label>
              @if($datos_tecnico->foto_plano)
                <img src="{{ Storage::url($datos_tecnico->foto_plano) }}"
                     alt="Foto Plano" class="mb-4 max-h-48 border">
              @endif
              <input type="file" name="foto_plano" id="foto_plano"
                     class="mt-1 block w-full text-gray-700">
              @error('foto_plano')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Observaciones --}}
            <div class="md:col-span-2">
              <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
              <textarea name="observaciones" id="observaciones" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observaciones', $datos_tecnico->observaciones) }}</textarea>
              @error('observaciones')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
          </div>

          <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                    class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
              Actualizar
            </button>
            <a href="{{ route('abonados.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
              Cancelar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
