<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vencimiento extends Model
{
    use HasFactory;

    public function DetalleCompra(){
        return $this-> belongsTo(DetalleCompra::class);
    }
}
