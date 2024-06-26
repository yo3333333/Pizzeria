<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
    use HasFactory;
    use softDeletes;
    
    protected $fillable = ['nombre', 'sueldo', 'telefono', 'puesto', 'fecha_nac', 'avatar'];

    protected $guarded = ['id'];

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }

}
