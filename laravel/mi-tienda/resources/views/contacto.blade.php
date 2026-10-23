@extends('layouts.base') 

@section('contenido')
<div style="max-width: 500px; margin: 0 auto;">
    <h2>Formulario de Contacto - Pedidos</h2>
    
    <form id="form-pedido" method="POST" action="procesar.php" class="formulario-contacto">
        

        <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" required>
        </div>
        
        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" placeholder="Tu Correo Electrónico" required>
        </div>
        
        <div class="form-group">
            <label for="mensaje">Tu Mensaje</label>
            <textarea id="mensaje" name="mensaje" placeholder="¿Qué prenda estás buscando?" rows="3" required></textarea>
        </div>
        
        <button type="submit">Enviar Mensaje</button>
        <p id="aviso-pedido" class="aviso"></p>
    </form>
</div>
@endsection
