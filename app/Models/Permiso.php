<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = "permissions";

    public function partes(){
        return $this->belongsTo(Parte::class, 'id_partes', 'id');
    }
}

