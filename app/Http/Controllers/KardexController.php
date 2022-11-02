<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTemporalVentaRequest;
use App\Http\Requests\UpdateTemporalVentaRequest;
use App\Http\Requests\TemporalVentaRequest;
use Illuminate\Support\Facades\Gate;

class KardexController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        abort_if(Gate::denies('kardex'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $fecha = $request->input('fecha');

        if($fecha == null){
            $fecha = date("Y-m-d");
        }

        $kardex = DB::table('kardex')->where('created_at',$fecha)->get();

        return view('kardex/index')->with('kardex', $kardex)->with('fecha', $fecha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTemporalVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemporalVentaRequest $request)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTemporalVentaRequest  $request
     * @param  \App\Models\TemporalVenta  $temporalVenta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemporalVentaRequest $request, $temporalVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemporalVenta  $temporalVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy( $temporalVenta)
    {
        //
    }
}
