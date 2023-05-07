<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class RoleController extends Controller
{

    
 public function createPDF(){
    $roles = Role::all();

    $data = [
        'title' => 'Listado de Roles',
        'date' => date('m/d/Y'),
        'roles' =>$roles,
    ];
    return PDF::loadView('roles/pdf', $data)
    ->setPaper('a4', 'landscape')
    ->download('Listado_de_Roles_'.date('m_d_Y').'.pdf');

}

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        $roles = Role::paginate(5);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        $permissions = Permission::all()->pluck('name', 'id');
        // dd($permissions);
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= ([
            'name'=>'required | max:50 | unique:roles,name',
            'descripcion'=>'required | max:100',
        ]);

        $mensaje =[
            'name.required'=>'El nombre del rol es obligatorio' ,
            'name.max'=>'El nombre del rol es demasiado largo' ,
            'name.unique'=>'El nombre del rol ya esta en uso' ,

            'descripcion.required'=>'La descripcion del rol es obligatorio' ,
            'descripcion.max'=>'La descrpcion del rol es demasiado largo' ,
        ];
        $this->validate($request, $rules, $mensaje);
        $role = Role::create($request->only('name','descripcion'));

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        $creado = $role->save();
        if ($creado) {
        return redirect()->route('roles.index')
        ->with('msj', 'El rol fue creado con exito');
    } else {

    }
}


    public function edit($id)
    {
        abort_if(Gate::denies('role_actualizar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $role = Role::find($id);

        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        //dd($role);
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->descripcion= $request->input('descripcion');

        $role->save();

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('role_eliminar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        Role::destroy($id);

        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('role_detalle'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $role = Role::find($id);

        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        //dd($role);
        return view('roles.show', compact('role', 'permissions'));
    }
}
