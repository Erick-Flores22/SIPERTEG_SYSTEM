<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial {{ $abonado->nombre }} {{ $abonado->apellido }}</title>
  <style>
    body { font-family: sans-serif; font-size: 12px; }
    h1 { text-align: center; font-size: 18px; margin-bottom: 0.5em; }
    .section { margin-bottom: 1em; }
    .section h2 { font-size: 14px; border-bottom: 1px solid #333; margin-bottom: 0.25em; }
    table { width: 100%; border-collapse: collapse; margin-top: 0.5em; }
    th, td { border: 1px solid #666; padding: 4px; text-align: left; }
    img { max-height: 150px; display: block; margin-top: 0.5em; }
  </style>
</head>
<body>
  <h1>Historial de {{ $abonado->nombre }} {{ $abonado->apellido }}</h1>

  <div class="section">
    <h2>Datos Personales</h2>
    <p><strong>CI:</strong> {{ $abonado->ci }}</p>
    <p><strong>Teléfono 1:</strong> {{ $abonado->telefono1 }}</p>
    <p><strong>Teléfono 2:</strong> {{ $abonado->telefono2 ?? '–' }}</p>
    <p><strong>Dirección:</strong> {{ $abonado->zona }}, {{ $abonado->calle }} #{{ $abonado->numero_casa }}</p>
    <p><strong>Fecha corte:</strong> {{ $abonado->fecha_corte?->format('Y-m-d') ?? '–' }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($abonado->estado) }}</p>
  </div>

  <div class="section">
    <h2>Datos Técnicos</h2>
    @if($abonado->datosTecnico)
      @php($d = $abonado->datosTecnico)
      <p><strong>Plan:</strong> {{ $d->plan }}</p>
      <p><strong>ODN:</strong> {{ $d->odn }}</p>
      <p><strong>PON:</strong> {{ $d->pon }}</p>
      <p><strong>Password:</strong> {{ $d->password }}</p>
      <p><strong>Código Técnico:</strong> {{ $d->codigo_tecnico }}</p>
      <p><strong>Código Sistema:</strong> {{ $d->codigo_sistema }}</p>
      <p><strong>Nodo:</strong> {{ $d->nodo }}</p>
      <p><strong>Caja Distribución:</strong> {{ $d->caja_distribucion }}</p>
      <p><strong>Instalación:</strong> {{ $d->fecha_instalacion->format('Y-m-d') }}</p>
      <p><strong>Observaciones:</strong> {{ $d->observaciones ?? '–' }}</p>
      @if($d->foto_plano)
        <img src="{{ storage_path('app/public/'.$d->foto_plano) }}" alt="Foto Plano">
      @endif
    @else
      <p>No hay datos técnicos registrados.</p>
    @endif
  </div>

  <div class="section">
    <h2>Cobros</h2>
    @if($abonado->cobros->isEmpty())
      <p>Sin cobros registrados.</p>
    @else
      <table>
        <thead>
          <tr>
            <th>Mes</th><th>Año</th><th>Día</th><th>Monto</th><th>Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach($abonado->cobros as $c)
          <tr>
            <td>{{ $c->mes }}</td>
            <td>{{ $c->anio }}</td>
            <td>{{ $c->dia }}</td>
            <td>{{ number_format($c->monto,2) }}</td>
            <td>{{ ucfirst($c->estado_pago) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  <div class="section">
    <h2>Fallas</h2>
    @if($abonado->fallas->isEmpty())
      <p>Sin fallas reportadas.</p>
    @else
      <table>
        <thead>
          <tr>
            <th>Tipo</th><th>Detalle</th><th>Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach($abonado->fallas as $f)
          <tr>
            <td>{{ ucfirst($f->tipo_falla) }}</td>
            <td>{{ $f->detalle ?? '–' }}</td>
            <td>{{ ucfirst($f->estado) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</body>
</html>
