{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
  <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
    {{-- Sidebar --}}
    <aside 
      x-data="{ open: true }"
      :class="open ? 'w-64' : 'w-16'"
      class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-300 flex flex-col"
    >
      {{-- Logo & Toggle --}}
      <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-2">
          <img src="{{ asset('storage/logo_siperteg.png') }}" alt="Logo de SIPERTEG" class="h-8 w-8">
          <span x-show="open" class="text-lg font-bold text-gray-900 dark:text-white">SIPERTEG</span>
        </div>
        <button @click="open = !open" class="p-2 rounded focus:outline-none text-gray-900 dark:text-white">
          <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      {{-- Navigation --}}
      <nav class="flex-1 overflow-y-auto mt-4">
        @php
          $links = [
            ['route'=>'dashboard','label'=>'Dashboard','icon'=>'M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5-6l2 2m-7-2H9'],
            ['route'=>'abonados.index','label'=>'Abonados','icon'=>'M16 11V5a2 2 0 00-2-2H6a2 ...'],
            ['route'=>'cobros.index','label'=>'Cobros','icon'=>'M9 17v-6a3 3 0 00-6 0v6'],
            ['route'=>'fallas.index','label'=>'Fallas','icon'=>'M12 8c.667 0 1.333.333 2 1'],
            ['route'=>'instalaciones.index','label'=>'Instalaciones','icon'=>'M5 13l4 4L19 7'],
            ['route'=>'defectos.index','label'=>'Defectos','icon'=>'M12 4v16m8-8H4'],
            ['route'=>'nodos.index','label'=>'Nodos','icon'=>'M4 6h16M4 12h16M4 18h16'],
            ['route'=>'cajas_distribucion.index','label'=>'Cajas','icon'=>'M20 12H4m16 0l-4-4m4 4l-4 4'],
            ['route'=>'estadisticas.index','label'=>'Estadisticas','icon'=>'M12 8c.667 0 1.333.333 2 1'],
          ];
        @endphp

        @foreach($links as $link)
          <a href="{{ route($link['route']) }}"
             class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $link['icon'] }}" />
            </svg>
            <span x-show="open" class="ml-3">{{ $link['label'] }}</span>
          </a>
        @endforeach
      </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 overflow-auto p-6">
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
        </h2>
      </x-slot>

      {{-- Stats Cards --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Abonados</h3>
          <p class="mt-2 text-2xl font-bold text-blue-600">{{ \App\Models\Abonado::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Cobros Totales</h3>
          <p class="mt-2 text-2xl font-bold text-green-600">{{ \App\Models\Cobro::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Pendientes de Cobro</h3>
          <p class="mt-2 text-2xl font-bold text-red-500">{{ \App\Models\Cobro::where('estado_pago','pendiente')->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Fallas</h3>
          <p class="mt-2 text-2xl font-bold text-purple-600">{{ \App\Models\Falla::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Fallas Pendientes</h3>
          <p class="mt-2 text-2xl font-bold text-yellow-500">{{ \App\Models\Falla::where('estado','pendiente')->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Instalaciones</h3>
          <p class="mt-2 text-2xl font-bold text-indigo-600">{{ \App\Models\Instalacion::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Defectos</h3>
          <p class="mt-2 text-2xl font-bold text-pink-600">{{ \App\Models\Defecto::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nodos</h3>
          <p class="mt-2 text-2xl font-bold text-teal-600">{{ \App\Models\Nodo::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Cajas Distribución</h3>
          <p class="mt-2 text-2xl font-bold text-yellow-700">{{ \App\Models\CajaDistribucion::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Datos Técnicos</h3>
          <p class="mt-2 text-2xl font-bold text-blue-800">{{ \App\Models\DatosTecnico::count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Ingresos (Pagados)</h3>
          <p class="mt-2 text-2xl font-bold text-green-700">${{ number_format(\App\Models\Cobro::where('estado_pago','pagado')->sum('monto'), 2) }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
          <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Usuario Actual</h3>
          <p class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
        </div>
      </div>
    </main>
  </div>
</x-app-layout>
