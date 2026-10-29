@extends('layouts.base')

@section('contenido')
    <h1>Jugueteria El Trompo</h1>

    <form action="/juguetes/nuevo" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del juguete:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
        </div>

        <div class="form-group">
            <label for="precio">Precio en Bs:</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio') }}">
        </div>

        <div class="form-group">
        <label for="stock">Stock disponible:</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock') }}">
      </div>
        <button type="submit">Registrar juguete</button>


        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px 15px; border-radius: 4px; margin-top: 15px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection