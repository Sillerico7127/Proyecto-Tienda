@extends('layouts.base')

@section('contenido')
    <h2>Agregar Nuevo Producto</h2>

    <form method="POST" action="/productos/nuevo">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio') }}">
            @error('precio')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Guardar Producto</button>
        <a href="/panel" style="margin-left: 10px; text-decoration: none; color: #555;">Cancelar</a>
    </form>
@endsection