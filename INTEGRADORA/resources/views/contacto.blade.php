@extends('layouts.base')

@section('contenido')
<div style="max-width: 500px; margin: 0 auto;">
    <h2>Formulario de Contacto - Pedidos</h2>
    
    <!-- Mensaje de éxito de Laravel -->
    @if(session('success'))
        <div id="alerta-exito" style="background: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 15px; border: 1px solid #c3e6cb; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <form id="form-pedido" method="POST" action="/contacto" class="formulario-contacto">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" value="{{ old('nombre') }}">
        </div>
        
        <div class="form-group">
            <label for="correo">Correo electrónico</label>
            <input type="text" id="correo" name="correo" placeholder="Tu Correo Electrónico" value="{{ old('correo') }}">
        </div>
        
        <div class="form-group">
            <label for="mensaje">Tu Mensaje</label>
            <textarea id="mensaje" name="mensaje" placeholder="¿Qué prenda estás buscando?" rows="3">{{ old('mensaje') }}</textarea>
        </div>
        
        <button type="submit">Enviar Mensaje</button>
        
        <!-- Recuadro para los avisos (ahora con estilos de caja) -->
        <p id="aviso-pedido" style="margin-top: 15px; font-weight: bold; padding: 0; border-radius: 5px; transition: all 0.3s ease;"></p>
    </form>
</div>

<!-- Script de validación con JavaScript -->
<script>
    const formularioPedido = document.querySelector("#form-pedido");
    const avisoPedido = document.querySelector("#aviso-pedido");
    const alertaExito = document.querySelector("#alerta-exito");

    function revisarPedido(event) {
        const nombre = document.querySelector("#nombre").value.trim();
        const correo = document.querySelector("#correo").value.trim();
        const mensaje = document.querySelector("#mensaje").value.trim();

        // Si hay un mensaje de éxito en pantalla, lo ocultamos al intentar enviar de nuevo
        if (alertaExito) {
            alertaExito.style.display = "none";
        }

        // Función para aplicar estilos de error en caja roja
        function mostrarError(texto) {
            event.preventDefault();
            avisoPedido.textContent = texto;
            avisoPedido.style.background = "#f8d7da";
            avisoPedido.style.color = "#721c24";
            avisoPedido.style.padding = "12px";
            avisoPedido.style.border = "1px solid #f5c6cb";
        }

        if (nombre === "") {
            mostrarError("Falta tu nombre, caserito.");
        } else if (correo.includes("@") === false) {
            mostrarError("Ese correo no parece correo: le falta el @.");
        } else if (mensaje === "") { 
            mostrarError("Por favor, escribe qué prenda estás buscando.");
        } else {
            // Si todo está bien, limpiamos el aviso de error
            avisoPedido.textContent = "";
            avisoPedido.style.padding = "0";
            avisoPedido.style.border = "none";
            avisoPedido.style.background = "transparent";
        }
    }

    formularioPedido.addEventListener("submit", revisarPedido);
</script>
@endsection