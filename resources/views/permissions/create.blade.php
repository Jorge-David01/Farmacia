@extends('plantilla.principalpag')
@section('pestania', 'Formulario de permisos')

@section('contenido')

<div class="content-wrapper">
  <div class="container-fluid">


    <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal">
      @csrf

      <h1 style="margin-left: 2% ;  margin-bottom: 3%; "> Creación de Permisos </h1>


      <h1 style="margin-bottom: 2%;"></h1>

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">

            <label for="name" class="col-sm-2 col-form-label">Nombre del permiso</label>
            <div class="col-sm-7">
              <div class="form-group">
                <input type="text" class="form-control" name="name" autofocus>
              </div>
            </div>



            <div style="margin-left: 1% ;" class="item form-group">
              <div>
                <button class="btn btn-danger" type="button" onclick="window.location='/permissions'">Cancelar</button>
                <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>


          </div>
        </div>
      </div>
    </form>
  </div>
</div>

@stop