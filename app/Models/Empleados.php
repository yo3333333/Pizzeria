<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }

}
