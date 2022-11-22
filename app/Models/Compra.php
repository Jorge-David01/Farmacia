<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    public function detalles(){
        return $this-> hasMany(DetalleCompra::class,'id_compra');
    }
    public function Proveed(){
        return $this-> belongsTo(Proveedor::class,'id_proveedor');
    }
}
