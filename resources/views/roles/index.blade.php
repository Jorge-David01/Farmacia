@extends('plantilla.principalpag')
@section('pestania', 'Listado Roles')


@section('contenido')
@section('TituloPlantillas', 'Lista de roles')

@if(session('mensaje'))
<div class="alert alert-success">
  {{session('mensaje')}}
</div>
@endif


<div class="content-wrapper">
  <div class="container-fluid">
  <h1 style="margin-bottom: 6%;"></h1>

    <a class="btn btn-warning" href='/rolesnuevo'>Nuevo rol</a>
    <h1 style="margin-bottom: 2%;"></h1>

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">


          <table class="table-bordered align-items-center">
            <thead>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Nombre </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Descripcion </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Detalles </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Editar </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Eliminar </th>
            </thead>
            <tbody>

              <td>
                @forelse ($roles as $role)
                <tr>
                  <td style="padding: 15px;">{{ $role->name }}</td>
                  <td style="padding: 15px;">{{ $role->descripcion }}</td>

                  <td style="padding: 15px;">
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success"> <i
                      class="material-icons">detalles</i> </a>

                   

                 
                  </td>

                  <td style="padding: 15px;">
                  @if ($role->id != 1)
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"> <i
                      class="material-icons">editar</i> </a>
                    @endif
                  </td>

                  <td style="padding: 15px;">
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
