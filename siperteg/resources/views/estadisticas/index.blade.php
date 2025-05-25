<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
        Estadísticas
      </h2>
      <a href="{{ route('dashboard') }}"
         class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
        Volver
      </a>
    </div>
  </x-slot>

  <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
    @foreach([
      ['id'=>'chartAbonados','title'=>'Abonados'],
      ['id'=>'chartCobros','title'=>'Cobros'],
      ['id'=>'chartFallas','title'=>'Fallas'],
      ['id'=>'chartInstalaciones','title'=>'Instalaciones'],
      ['id'=>'chartDefectos','title'=>'Defectos'],
    ] as $c)
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
      <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">{{ $c['title'] }}</h3>
      {{-- width y height fijos --}}
      <canvas id="{{ $c['id'] }}" width="400" height="240"></canvas>
    </div>
    @endforeach
  </div>

  {{-- Chart.js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  window.onload = function() {
    // Arrays inyectados
    const abonLabels = @json($abonadosLabels);
    const abonData   = @json($abonadosData);

    const cobLabels = @json($cobrosLabels);
    const cobData   = @json($cobrosData);

    const falLabels = @json($fallasLabels);
    const falData   = @json($fallasData);

    const insLabels = @json($instLabels);
    const insData   = @json($instData);

    const defLabels = @json($defLabels);
    const defData   = @json($defData);

    // Helpers
    function pieChart(id, labels, data, colors) {
      new Chart(document.getElementById(id), {
        type: 'pie',
        data: { labels, datasets: [{ data, backgroundColor: colors }] },
        options: {
          responsive: false,            // ❌ desactivamos resize
          maintainAspectRatio: false    // ❌ no recalcula tamaño
        }
      });
    }
    function barChart(id, labels, data, colors) {
      new Chart(document.getElementById(id), {
        type: 'bar',
        data: {
          labels,
          datasets: [{
            label: '# de registros',
            data,
            backgroundColor: colors
          }]
        },
        options: {
          responsive: false,
          maintainAspectRatio: false,
          scales: { y: { beginAtZero: true, ticks: { precision:0 } } }
        }
      });
    }

    // Colores
    const two = ['#34d399','#f87171'];
    const three = ['#60a5fa','#fbbf24','#f472b6'];

    // Crear
    pieChart('chartAbonados', abonLabels, abonData, two);
    pieChart('chartCobros',   cobLabels, cobData,   ['#60a5fa','#fbbf24']);
    pieChart('chartFallas',   falLabels, falData,   ['#f87171','#34d399']);
    barChart('chartInstalaciones', insLabels, insData, two);
    barChart('chartDefectos',      defLabels, defData, three);
  };
  </script>
</x-app-layout>
