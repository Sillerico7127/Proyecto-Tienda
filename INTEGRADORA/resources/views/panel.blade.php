@extends('layouts.base')

@section('contenido')
    <h2>Panel de Administración</h2>
    <p>Bienvenido, administrador. Aquí puedes gestionar los productos de tu tienda.</p>

    <div style="margin-bottom: 20px;">
        <a href="/productos/nuevo"><button style="background: #007bff;">+ Agregar Nuevo Producto</button></a>
    </div>

    <h3>Listado Actual de Productos</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ $producto->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection