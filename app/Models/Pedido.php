<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
    public function empleados()
    {
        return $this->belongsTo(Empleados::class);
    }
      
    use HasFactory;
}


