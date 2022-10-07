@extends('plantilla.principalpag')
@section('pestania', 'Listado Roles')

@section('contenido')
@if(session('mensaje'))
<div class="alert alert-success">
  {{session('mensaje')}}
</div>
@endif

<div class="content-wrapper">
  <div class="container-fluid">



    <h1 style="  margin-bottom: 3%;"> Lista de Roles </h1>
    <a class="btn btn-warning" href='/rolesnuevo'>Nuevo rol</a>
    <h1 style="margin-bottom: 2%;"></h1>

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">


          <table class="table-bordered align-items-center">
            <thead>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Nombre </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd; width: 72%" class="text-center"> Permisos </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Acciones </th>
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

                    <a href="" class="btn btn-success"> <i class="material-icons">editar</i> </a>

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
      </div>
    </div>
  </div>
</div>
@endsection