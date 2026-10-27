<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda ropa deportiva Wishbone</title>
    <style>
      
        body { 
            background-color: #28272a;
            color: #ffffff;
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            max-width: 800px; 
            margin: 0 auto; 
            padding: 20px; 
            transition: background 0.3s ease, color 0.3s ease;
        }

     
        body.claro {
            background-color: #f4f6f9;
            color: #333333;
        }

        header { 
            background: #1a2a4a; 
            color: #fff; 
            padding: 1rem; 
            border-radius: 8px; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        h1 { margin: 0; font-size: 1.5rem; }

       
        nav ul {
            display: flex;
            list-style: none;
            gap: 15px;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        nav a, nav button.link-logout { 
            color: #ffd; 
            text-decoration: none; 
            font-weight: bold; 
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding: 0;
        }
        
        nav a:hover, nav button.link-logout:hover { 
            text-decoration: underline; 
        }

        .controles-header {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-control {
            background: #2c3e50;
            color: white;
            border: 1px solid #ffd;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        #btn-menu {
            display: none; 
        }

        main { margin-top: 2rem; min-height: 400px; }

        footer { margin-top: 2rem; color: #888; border-top: 1px solid #444; padding-top: 1rem; text-align: center; }

    
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: .5rem; }
        .form-group input, .form-group textarea { width: 100%; padding: .5rem; border: 1px solid #ccc; border-radius: 4px; background: #222; color: #fff; }
        body.claro .form-group input, body.claro .form-group textarea { background: #fff; color: #333; }
        
        button[type="submit"] { background: #1a2a4a; color: white; padding: .5rem 1rem; border: none; border-radius: 4px; cursor: pointer; }
        
       
        .grid-productos { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); 
            gap: 1rem; 
        }

        .producto-card { 
            border: 1px solid #444; 
            padding: 1rem; 
            border-radius: 8px; 
            text-align: center; 
            background: #1e1e1e; 
        }

        .producto-card h3, .producto-card p {
            color: #ffffff !important; 
        }

        body.claro .producto-card { 
            background: #ffffff; 
            border-color: #ddd; 
        }

        body.claro .producto-card h3, body.claro .producto-card p {
            color: #333333 !important; 
        }

   
        @media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            .controles-header {
                width: 100%;
                justify-content: space-between;
                margin-top: 10px;
            }
            #btn-menu {
                display: block; 
            }
            nav {
                width: 100%;
            }
            nav ul {
                display: none;
                flex-direction: column;
                width: 100%;
                margin-top: 10px;
                gap: 10px;
            }
            nav ul.abierto {
                display: flex; 
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Tienda de Ropa deportiva Wishbone</h1>
        
        <div class="controles-header">
            <button id="btn-tema" class="btn-control"> 🌙 Ir a Modo Noche</button>
            <button id="btn-menu" class="btn-control">☰ Menú</button>
        </div>

        <nav>
            <ul>
                <li><a href="/inicio">Inicio</a></li>
                <li><a href="/productos">Productos</a></li>
                <li><a href="/contacto">Contacto</a></li>
                @auth
                    <li><a href="/panel">Panel</a></li>
                    <li>
                        <form action="/logout" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="link-logout">Salir</button>
                        </form>
                    </li>
                @else
                    <li><a href="/login">Login</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>Tienda de Ropa Deportiva WISHBONE - GRACIA ESTHER SILLERICO HERRERA - Hecho con Laravel</footer>

    <script>
        const cuerpo = document.querySelector("body");
        const botonModo = document.querySelector("#btn-tema");

       
        if (localStorage.getItem("modo") === "oscuro") {
            cuerpo.classList.remove("claro");
            if(botonModo) botonModo.textContent = " ☀️ Ir a Modo Día";
        } else {
            cuerpo.classList.add("claro");
            if(botonModo) botonModo.textContent = " 🌙 Ir a Modo Noche";
        }

      
        function alternarModo(){
            cuerpo.classList.toggle("claro");
            
            if (cuerpo.classList.contains("claro")) {
                localStorage.setItem("modo", "dia");
                botonModo.textContent = " 🌙 Ir a Modo Noche";
            } else {
                localStorage.setItem("modo", "oscuro");
                botonModo.textContent = " ☀️ Ir a Modo Día";
            }
        }

        if(botonModo) {
            botonModo.addEventListener("click", alternarModo);
        }

        // 3. Menú desplegable para dispositivos móviles
        const botonMenu = document.querySelector("#btn-menu");
        const menu = document.querySelector("nav ul");

        function alternarMenu(){
            menu.classList.toggle("abierto");    
        }

        if(botonMenu) {
            botonMenu.addEventListener("click", alternarMenu);
        }
    </script>
</body>
</html>