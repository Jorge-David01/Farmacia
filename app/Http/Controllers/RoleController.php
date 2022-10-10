<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        $roles = Role::paginate(10);

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
        $role = Role::create($request->only('name'));

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('role_actualizar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

    }


    public function destroy($id)
    {
        abort_if(Gate::denies('role_eliminar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        Role::destroy($id);

        return redirect()->route('roles.index');
    }
}
