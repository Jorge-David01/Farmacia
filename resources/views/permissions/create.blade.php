@extends('plantilla.principalpag')
@section('pestania', 'Formulario de permisos')

@section('contenido')

<div class="x_content">

    <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal">
        @csrf
        <div class="card">
          <div class="card-header card-header-primary">
          <h1 style="margin-left: 4% ;  margin-bottom: 3%; "> Creación de Permisos </h1>
          </div>
          <div class="card-body">
            <div class="row">
              <label for="name" class="col-sm-2 col-form-label">Nombre del permiso</label>
              <div class="col-sm-7">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" autofocus>
                </div>
              </div>
            </div>
          </div>
          <!--Footer-->
          <div class="ln_solid"></div>
                <div class="item form-group">
                    <br><br>
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-danger" type="button" onclick="window.location='/permissions'">Cancelar</button>
                        <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
        </div>
          <!--End footer-->
        </div>
      </form>
    
</div>
@stop
