<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda ropa deportiva wishbone</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 20px; }
        header { background: #1a2a4a; color: #fff; padding: 1rem; border-radius: 8px; }
        h1 { margin: 0; padding-bottom: 10px; }
        nav a { color: #ffd; margin-right: 1rem; text-decoration: none; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        main { margin-top: 2rem; min-height: 400px; }
        footer { margin-top: 2rem; color: #666; border-top: 1px solid #ddd; padding-top: 1rem; }
        /* Estilos básicos para el formulario y productos */
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: .5rem; }
        .form-group input, .form-group textarea { width: 100%; padding: .5rem; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #1a2a4a; color: white; padding: .5rem 1rem; border: none; border-radius: 4px; cursor: pointer; }
        .grid-productos { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; }
        .producto-card { border: 1px solid #ddd; padding: 1rem; border-radius: 8px; text-align: center; }
    </style>
</head>
<body>

    <header>
        <h1>Tienda de Ropa deportiva</h1>
        <nav>
            <a href="/">Inicio</a>
            <a href="/productos">Productos</a>
            <a href="/contacto">Formulario de Contacto</a>
        </nav>
    </header>

    <main>
         {{-- Acá se "enchufa" el contenido de cada página --}}
    @yield('contenido')
    </main>

    <footer>Tienda de Ropa Deportiva WISHBONE  - GRACIA ESTHER SILLERICO HERRERA - hecho con Laravel</footer>

</body>
</html>
