@extends('plantilla.principalpag')
@section('pestania', 'Formulario de roles')

@section('contenido')

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

    <h1 style="margin-left: 2% ;  margin-bottom: 3%; "> Creación de roles </h1>

    <form id="form_permissions" enctype="multipart/form-data"
    action="{{ route('roles.update', $role->id) }}"
    method="post">
  @method("PUT")
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
                    <input type="text" class="form-control" name="name" autocomplete="off" autofocus
                    @if(old('name'))
                    value="{{old('name')}}"
                    @else
                    value="{{$role->name}}"
                 @endif>
                </div>
              </div>
            </div>

            <div class="card-body">
                <div class="row">
                  <label for="name" class="col-sm-2 col-form-label">Descripcion</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input type="text" class="form-control" name="descripcion" autocomplete="off" autofocus
                      @if(old('name'))
                    value="{{old('descripcion')}}"
                    @else
                    value="{{$role->descripcion}}"
                 @endif>
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
                                    value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
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
          <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-danger" type="button" onclick="window.location='/roles'">Cancelar</button>
                        <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
        </div>
          <!--End footer-->
        </div>
      </form>
    </div>
    </div>
</div>
@endsection
