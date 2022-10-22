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



    <h1 style="  margin-bottom: 3%; margin-left: 2%;"> Lista de roles </h1>
    <a class="btn btn-warning" href='/rolesnuevo'>Nuevo rol</a>
    <h1 style="margin-bottom: 2%;"></h1>

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">


          <table class="table-bordered align-items-center">
            <thead>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Nombre </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Descripcion </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Acciones </th>
            </thead>
            <tbody>

              <td>
                @forelse ($roles as $role)
                <tr>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->descripcion }}</td>
                  <td>
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success"> <i
                      class="material-icons">detalles</i> </a>
                    @if ($role->id != 1)
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"> <i
                      class="material-icons">editar</i> </a>
                    @endif
                  @if ($role->id != 1)
                    <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                      onsubmit="return confirm('Desea eliminar este rol')" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" rel="tooltip" class="btn btn-danger">
                        <i class="material-icons">Eliminar</i>
                      </button>
                    </form>
                    @endif
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
