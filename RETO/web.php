<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Contacto;
use App\Models\Juguete;


Route::get('/', function () {
    return redirect('/inicio');
});
Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/contacto', function () {
    return view('contacto');
});

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


Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos', ['productos' => $productos]);
});

Route::get('/productos/nuevo', function () {
    return view('productos-nuevo');
})->middleware('auth');


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


Route::post('/login', function () {
    $credenciales = [
        'email' => request()->input('email'),
        'password' => request()->input('password'),
    ];

    if (Auth::attempt($credenciales)) {
     
        request()->session()->regenerate();

        return redirect('/panel');
    }

  
    return back()->with('error', 'Correo o contraseña incorrectos.');
});


Route::post('/logout', function () {
    Auth::logout();

    return redirect('/inicio');
});


Route::get('/panel', function () {
    $productos = Producto::all();
    return view('panel', ['productos' => $productos]);
})->middleware('auth');



Route::get('/juguetes', function () {
    $juguetes = Juguete::all();
    return view('juguetes.index', compact('juguetes'));
});

Route::get('/juguetes/nuevo', function () {
    return view('juguetes.create');
});

// PRACTICA RETO
Route::post('/juguetes/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
        'stock' => 'required|integer',
    ], [
        'nombre.required' => 'Pone el nombre del juguete.',
        'precio.required' => 'Pone el precio del juguete.',
        'precio.integer' => 'Aca el precio va entero, sin decimales ni letras.',
        'stock.required' => 'Pone la cantidad de stock.',
        'stock.integer' => 'El stock debe ser un número entero.'
    ]);

    Juguete::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
        'stock' => request()->input('stock')
    ]);

    return redirect('/juguetes');
});