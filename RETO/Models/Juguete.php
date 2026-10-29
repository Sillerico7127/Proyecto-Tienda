<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Juguete extends Model
{
   
   protected $table = 'juguetes';
    
    protected $fillable = ['nombre', 'precio', 'stock'];
    
}
