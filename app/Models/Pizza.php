<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function pedido()
    {
        return $this->belongsToMany(Pedido::class);
    }
    use HasFactory;
}
