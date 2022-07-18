<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function proveedores(){
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id');
    }

    public function activos(){
        return $this->belongsTo(ActivoProducto::class, 'id','id_producto');
    }

  
}
