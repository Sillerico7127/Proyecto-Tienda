@extends('layouts.base')

@section('contenido')
    <h1>Jugueteria El Trompo</h1>
    <p>Bienvenidos a Juguetería El Trompo</p>

    <p>Hay {{ count($juguetes) }} juguetes en el estante.</p>

    <ul>
        @foreach($juguetes as $juguete)
            <li>{{ $juguete->nombre }} - {{ $juguete->precio }} Bs  - cantidad: {{ $juguete->stock }} </li>
        @endforeach
    </ul>

    <p>Estante atendido por Gracia Esther Sillerico Herrera</p>

    <a href="/juguetes/nuevo">Registrar nuevo juguete</a>
@endsection