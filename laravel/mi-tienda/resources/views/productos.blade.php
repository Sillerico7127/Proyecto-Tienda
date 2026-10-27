@extends('layouts.base')

@section('contenido')
    <h2>Catálogo de Productos - Ropa Deportiva</h2>
    
    @if($productos->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            @foreach($productos as $producto)
                <div style="border: 1px solid #ccc; padding: 15px; border-radius: 5px; width: 200px; background: #fff;">
                    <h3>{{ $producto->nombre }}</h3>
                    <p style="font-size: 1.2rem; font-weight: bold; color: green;">${{ $producto->precio }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection