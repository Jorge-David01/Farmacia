<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemporalCotizacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
}
