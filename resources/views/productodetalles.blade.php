@extends('plantilla.principalpag')
@section('pestania', 'Detalles del producto')
@section('contenido')


<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-left: 2%; margin-bottom: 3%; ">Detalles de productos </h1>

        <h1 style="margin-bottom: 2%;"></h1>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">


                    <div class="table-responsive">

                        <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">

                            <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                                <th scope="col">Campo</th>
                                <th scope="col">Valor</th>
                            </tr>

                            <tr>
                                <th scope="row">Nombre del proveedor</th>
                                <td>{{$details->Nombre_del_proveedor}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Nombre del producto</th>
                                <td>{{$details->nombre_producto}}</td>
                            </tr>

                            <tr>

                                <th scope="row">Principio activo</th>
                                <td>{{$details->principio_activo}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Descripción</th>
                                <td>{{$details->descripcion}}</td>
                            </tr>

                        </table><br>
                        
                        <div style="text-align: center">
                        <a class="btn btn-success" href="/Producto">Volver</a>
                        <a style="display:inline-block;margin-left:1%;" class="btn btn-primary" href="/productoeditar/{{$details->id}}/editar">Actualizar</a>
                        </div>

                        <h1 style="margin-bottom: 2%;"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection