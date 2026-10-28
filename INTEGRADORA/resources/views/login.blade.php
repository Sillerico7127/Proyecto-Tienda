
@extends('layouts.base')

@section('contenido')
<div style="max-width: 500px; margin: 0 auto;">
    <h2>Iniciar Sesión (Administrador)</h2>

    @if(session('error'))
        <p style="color: red; font-weight: bold;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Entrar al Panel</button>
    </form>
@endsection
