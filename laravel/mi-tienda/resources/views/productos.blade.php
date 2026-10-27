@extends('layouts.base')
@section('contenido')
    <h2>Catálogo de Productos - Ropa Deportiva</h2>
    
    @if($productos->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
        <div class="grid-productos">
            @foreach($productos as $producto)
                <div class="producto-card">
                    <h3>{{ $producto->nombre }}</h3>
                    <p style="font-size: 1.2rem; font-weight: bold;">${{ $producto->precio }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection