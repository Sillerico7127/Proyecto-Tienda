<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

// 1. Ruta Inicio
Route::get('/inicio', function () {
    return view('inicio');
});

// 2. Ruta Contacto (Muestra el formulario de pedidos/contacto)
Route::get('/contacto', function () {
    return view('contacto');
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