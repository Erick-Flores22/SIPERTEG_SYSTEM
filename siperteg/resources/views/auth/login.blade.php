{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.guest')

@section('content')
  <h2 class="text-center text-2xl font-bold mb-6">Iniciar Sesión</h2>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Email --}}
    <div class="mb-4">
      <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
      <input id="email" name="email" type="email" required autofocus
             class="mt-1 block w-full px-3 py-2 border rounded" />
      @error('email')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Password --}}
    <div class="mb-4">
      <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
      <input id="password" name="password" type="password" required
             class="mt-1 block w-full px-3 py-2 border rounded" />
      @error('password')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Remember --}}
    <div class="mb-4 flex items-center">
      <input id="remember" name="remember" type="checkbox" class="mr-2">
      <label for="remember" class="text-sm text-gray-600">Recuérdame</label>
    </div>

    {{-- Botón --}}
    <div class="flex justify-end">
      <button type="submit"
              class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Entrar
      </button>
    </div>
  </form>
@endsection
