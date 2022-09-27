@extends('plantilla.principalpag')
@section('pestania', 'Listado Roles')

@section('contenido')
@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif
<div class="card-header pb-0">

        <div class="card-body">
            <div class="row">
            <div class="col-12">
                <h1 style="margin-left: 4% ;  margin-bottom: 3%; "> Lista de Roles </h1>
                <a style="margin-left: 4%;" class="btn btn-warning" href='/rolesnuevo'>Nuevo rol</a>
                <br>
            </div>
            </div>
            <table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >
                <thead>
                    <th class="text-center"> Nombre </th>
                    <th class="text-center" style="width: 70%"> Permisos </th>
                    <th class="text-center"> Acciones </th>
                </thead>
                <tbody>

                    <td>
                        @forelse ($roles as $role)
                        <tr>
                          <td>{{ $role->name }}</td>
                          <td>
                            @forelse ($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @empty
                                <span class="badge badge-danger">No permission added</span>
                            @endforelse
                          </td>
                          <td>

                            <a href="" class="btn btn-success"> <i
                              class="material-icons">editar</i> </a>

                              <button type="submit" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">Eliminar</i>
                              </button>
                            </form>
                          </td>

                </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
@endsection