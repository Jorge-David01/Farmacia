@extends('plantilla.principalpag')
@section('pestania', 'Formulario de roles')

@section('contenido')

<div class="content">
<div class="container-fluid">
    <div class="row">

    <div class="col-md-12">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        input{
            border-radius: 0px !important;
        }
    </style>

    <h1 style="margin-left: 4% ;  margin-bottom: 3%; "> Creación de Roles </h1>

    <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
        @csrf
        <div class="card ">
          <!--Header-->
          <div class="card-header card-header-primary">

          </div>
          <!--End header-->
          <!--Body-->
          <div class="card-body">
            <div class="row">
              <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
              <div class="col-sm-7">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" autocomplete="off" autofocus>
                </div>
              </div>
            </div>
            <div class="row">
              <label for="name" class="col-sm-2 col-form-label">Permisos</label>
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
                                  <input class="form-check-input" type="checkbox" name="permissions[]"
                                    value="{{ $id }}">
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
          </div>

          <!--End body-->

          <!--Footer-->
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          <!--End footer-->
        </div>
      </form>
    </div>
    </div>
</div>
</div>
@endsection
