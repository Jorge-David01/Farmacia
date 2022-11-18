@extends('plantilla.principalpag')
@section('pestania', 'Formulario de roles')

@section('contenido')


<style>
    input {
      border-radius: 0px !important;
    }
  </style>

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

            <h1 style="margin-left: 2% ;  margin-bottom: 3%; "> Creación de roles </h1>

            <h1 style="margin-bottom: 2%;"></h1>

            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="card">

                  <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
                    @csrf

                    <label style="margin-left: 1%;" for="name" class="col-sm-2 col-form-label">Nombre del rol</label>

                    <div class="col-sm-7">
                      <div class="form-group">
                        <input  style="margin-left: 1%;" type="text" class="form-control" name="name" value="{{old('name')}}" autocomplete="off" autofocus>
                      </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                          <label for="name" class="col-sm-2 col-form-label">Descripcion</label>
                          <div class="col-sm-7">
                            <div class="form-group">
                              <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}" autocomplete="off" autofocus>
                            </div>
                          </div>
                        </div>
                    <div class="row">
                      <label style="margin-left: 1%;" for="name" class="col-sm-2 col-form-label">Permisos</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <div class="tab-content">
                            <div class="tab-pane active">

                              <table class="table">
                                <tbody>
                                  @foreach ($permissions as $id => $permission)
                                  <tr>
                                    <td>
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $id }}">
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                    </td>
                                    <td>
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



                    <div style="text-align: center; " class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-danger" type="button" onclick="window.location='/roles'">Cancelar</button>
                        <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
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
