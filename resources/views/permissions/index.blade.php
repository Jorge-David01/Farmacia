@extends('plantilla.principalpag')
@section('pestania', 'Lista de permisos')

@section('contenido')

<div class="x_content">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $mensaje)
                    <li>
                        {{$mensaje}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        td {
            text-align: center;
        }
</style>

<h1 style="margin-left: 4% ;  margin-bottom: 3%; "> Lista de permisos </h1>
<a style="margin-left: 4%;" class="btn btn-warning" href="/permissionsnuevo">Nuevo permiso</a>

    <table  style="margin-top: 1%; width: 78%; margin-left: 4%;" >
    <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
        <th class="text-center">Nombre</th>
        <th class="text-center">Acciones</th>
    </tr>
        <tbody>
            @forelse ($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <a href="" class="btn btn-warning"><i
                        class="material-icons">editar</i></a>
                      <button class="btn btn-danger" type="submit" rel="tooltip">
                        <i class="material-icons">eliminar</i>
                      </button>
                </td>
    </tr>
    @endforeach
    </tbody>
    </table>
@stop
