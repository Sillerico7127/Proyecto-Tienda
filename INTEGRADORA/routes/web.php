<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Contacto;
use App\Models\Juguete;

// 1. Ruta Inicio
Route::get('/', function () {
    return redirect('/inicio');
});
Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/contacto', function () {
    return view('contacto');
});
// 2. Ruta Contacto (Muestra el formulario de pedidos/contacto)
Route::post('/contacto', function () {
    request()->validate([
        'nombre' => 'required',
        'correo' => 'required|email',
        'mensaje' => 'required',
    ]);

    Contacto::create([
        'nombre' => request()->input('nombre'),
        'correo' => request()->input('correo'),
        'mensaje' => request()->input('mensaje'),
    ]);

    
    return back()->with('success', '¡Gracias por escribirnos! Nos contactaremos contigo lo más pronto posible.');
});

// 3. Ruta Productos (Vitrina pública que muestra todos los productos)
Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos', ['productos' => $productos]);
});

// 4. Formulario para crear producto (Protegido con el candado middleware 'auth')
Route::get('/productos/nuevo', function () {
    return view('productos-nuevo');
})->middleware('auth');

// 5. Guardar el nuevo producto (Con validación de servidor en castellano)
Route::post('/productos/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'El nombre no puede quedar vacío.',
        'precio.required' => 'El precio no puede quedar vacío.',
        'precio.integer' => 'El precio tiene que ser un número entero, sin letras.',
    ]);

    Producto::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
    ]);

    return redirect('/productos');
})->middleware('auth');

// 6. Vista de Login
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/panel');
    }
    return view('login');
})->name('login');

// 7. Procesar Login (Auth::attempt busca el correo y contrasta la contraseña)
Route::post('/login', function () {
    $credenciales = [
        'email' => request()->input('email'),
        'password' => request()->input('password'),
    ];

    if (Auth::attempt($credenciales)) {
        // Sesión nueva apenas entra: si alguien espiaba la anterior, ya no le sirve.
        request()->session()->regenerate();

        return redirect('/panel');
    }

    // back() = "volvé a la página de donde veníamos", con un mensaje en el bolsillo.
    return back()->with('error', 'Correo o contraseña incorrectos.');
});

// 8. SALIR (Es POST y no un enlace a propósito para evitar que una imagen externa cierre tu sesión)
Route::post('/logout', function () {
    Auth::logout();

    return redirect('/inicio');
});

// 9. PANEL DEL DUEÑO (La primera página PRIVADA protegida con ->middleware('auth'))
Route::get('/panel', function () {
    $productos = Producto::all();
    return view('panel', ['productos' => $productos]);
})->middleware('auth');


// PRACTICA INTEGRADORA
Route::get('/juguetes', function () {
    $juguetes = Juguete::all();
    return view('juguetes.index', compact('juguetes'));
});

Route::get('/juguetes/nuevo', function () {
    return view('juguetes.create');
});

Route::post('/juguetes/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'Pone el nombre del juguete.',
        'precio.required' => 'Pone el precio del juguete.',
        'precio.integer' => 'Aca el precio va entero, sin decimales ni letras.',
    ]);

    Juguete::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
    ]);

    return redirect('/juguetes');
});