@extends('plantilla.principalpag')
@section('pestania', 'Detalles del producto')
@section('contenido')
@section('TituloPlantillas', 'Detalles del producto')


<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">

    <h1 style="margin-bottom: 6%;"></h1>


            <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form style="margin-left: 2%;" method="POST" >
                        @method('put')
                        @csrf

                        <div>
                            <label  style="margin-top: 3%;" for="nombre_producto">Nombre del proveedor:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombre_producto" id="nombre_producto" placeholder="nombre_producto" value="{{$details->Nombre_del_proveedor}}" maxlength="50" disabled>
                        </div>

                        <div>
                            <label  style="margin-top: 3%;" for="nombre_producto">Nombre del Producto:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombre_producto" id="nombre_producto" placeholder="nombre_producto" value="{{$details->nombre_producto}}" maxlength="50" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="principio_activo">Principio Activo:</label>
                            <input class="form-control " type="text" class="form-control-file" name="principio_activo" id="principio_activo" placeholder="principio_activo" value="{{$details->principio_activo}}" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="Descripcion">Descripcion:</label>
                            <input class="form-control " type="text" class="form-control-file" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$details->descripcion}}" maxlength="110" disabled>
                        </div>

                        <hr>
                        
                        
                        <div style="text-align: center">
                        <a class="btn btn-success" href="/Producto">Volver</a>
                        <a style="display:inline-block;margin-left:1%;" class="btn btn-primary" href="/productoeditar/{{$details->id}}/editar">Actualizar</a>
                        </div>


                    </form>

                </div>
            </div>
        </div>

        </div>
    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection