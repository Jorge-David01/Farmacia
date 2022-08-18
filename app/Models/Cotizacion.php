<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    public function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }
    public function detalles(){
        return $this->hasMany(DetalleCotizacion::class,'id_cotizacions', 'id');
    }
}
