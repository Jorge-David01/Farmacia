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
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Descripción </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Detalles </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Editar </th>
              <th style="background: #0088cc; text-align: center; border: 2px solid #dddddd;" class="text-center"> Eliminar </th>
            </thead>
            <tbody>

              <td>
                @forelse ($roles as $role)
                <tr>

                  <td style="padding: 30px;">{{ $role->name }}</td>
                  <td style="padding: 22px;">{{ $role->descripcion }}</td>

                  <td style="padding: 20px;">
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success"> detalles </a>
                  </td>

                  <td style="padding: 20px;">
                    @if ($role->id != 1)
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"> editar </a>
                    @endif
                  </td>

                  <td style="padding: 15px;">
                    @if ($role->id != 1)
                    <form action="{{ route('roles.destroy', $role->id) }}" method="post" onsubmit="return confirm('Desea eliminar este rol')" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button style="margin-top: 5%" type="submit" rel="tooltip" class="btn btn-danger">Eliminar
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
    {{$roles -> links() }}
  </div>
</div>
@endsection