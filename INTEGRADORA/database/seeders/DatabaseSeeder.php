<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear el usuario administrador
        User::updateOrCreate(
            ['email' => 'adming@gmail.com'],
            [
                'name' => 'Gracia',
                'password' => Hash::make('1234'),
            ]
        );

        // 2. Crear los productos
        Producto::create([
            'nombre' => 'Camiseta',
            'precio' => 150,
        ]);

        Producto::create([
            'nombre' => 'Buso deportivo',
            'precio' => 250,
        ]);
    }
}