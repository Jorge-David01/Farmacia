@extends('plantilla.principalpag')
@section('pestania', 'Formulario de roles')

@section('contenido')
@section('TituloPlantillas', 'Creación de roles')


<style>
    input {
      border-radius: 0px !important;
    }
  </style>

<h1 style="margin-bottom: 4%;"></h1>
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
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


        <div class="content-wrapper">
          <div class="container-fluid">

            <h1 style="margin-bottom: 1%;"></h1>

            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="card">

                  <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                    <label  for="name" class="col-sm-2 col-form-label">Nombre del rol:</label>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" autocomplete="off" autofocus>
                      </div>
                      </div>
                    </div>
                    </div>

                    <div  class="card-body">
                        <div style="margin-bottom: 2%;" class="row">
                          <label for="name" class="col-sm-2 col-form-label">Descripción:</label>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}" autocomplete="off" autofocus>
                            </div>
                          </div>
                          
                        </div>
                    <div class="row">
                    <label for="name"  class="col-sm-2 col-form-label">Permisos:</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="tab-content">
                            <div class="tab-pane active">

                              <table class="table  table-bordered  ">
                                <tbody>
                                  @foreach ($permissions as $id => $permission)
                                  <tr>
                                    <td>
                                      <div style="display: flex; justify-content: center;" class="form-check">
                                        
                                          <input  class="form-check-input" type="checkbox" name="permissions[]" value="{{ $id }}">
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                        
                                      </div>
                                    </td>
                                    <td style="display: flex; justify-content: center;">
                                      {{ $permission }}
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>

                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>

<hr>

                    <div style="text-align: center; " class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-warning" type="button" onclick="window.location='/roles'">Volver</button>
                        <a type="button" href="javascript:location.reload()" class="btn btn-danger">Restablecer</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                      </div>
                    </div>

                </div>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
