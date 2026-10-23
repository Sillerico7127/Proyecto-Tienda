<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});


// Ruta para la página de productos
Route::get('/productos', function () {
    return view('productos');
});
Route::get('/contacto', function () {
    return view('contacto');
});
