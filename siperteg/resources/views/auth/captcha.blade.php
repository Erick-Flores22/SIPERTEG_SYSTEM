{{-- resources/views/auth/captcha.blade.php --}}
@extends('layouts.guest')

@section('content')
  <h2 class="text-center text-2xl font-bold mb-6">Verificación CAPTCHA</h2>

  <form method="POST" action="{{ route('captcha.validate') }}">
    @csrf

    {{-- Imagen CAPTCHA + botón recargar --}}
    <div class="mb-4 flex justify-center items-center">
      <img
        id="captcha-img"
        src="{{ route('captcha.image') }}?r={{ random_int(0, 10000) }}"
        alt="Captcha"
        class="border rounded"
      >
      <button
        type="button"
        onclick="document.getElementById('captcha-img').src='{{ route('captcha.image') }}?r='+Math.random()"
        class="ml-3 px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"
      >
        Recargar
      </button>
    </div>

    {{-- Error --}}
    @if($errors->has('captcha'))
      <p class="text-red-600 text-sm mb-2">{{ $errors->first('captcha') }}</p>
    @endif

    {{-- Campo de texto --}}
    <div class="mb-6">
      <input
        name="captcha"
        type="text"
        required
        autofocus
        placeholder="Escribe el código"
        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring"
      >
    </div>

    {{-- Botón de envío --}}
    <div class="flex justify-end">
      <button
        type="submit"
        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
      >
        Verificar
      </button>
    </div>
  </form>
@endsection
