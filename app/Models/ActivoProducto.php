<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoProducto extends Model
{
    use HasFactory;
    public function principio(){
        return $this->belongsTo(PrincipioActivo::class, 'id_principio_activos','id');
    }

    public function activos(){
        return $this->belongsTo(Producto::class, 'id_producto','id');
    }
}
