@extends('plantilla.principalpag')
@section('pestania', 'Detalles del cliente')
@section('contenido')
@section('TituloPlantillas', 'Detalles del clientes')

<h1 style="margin-bottom: 6%;"></h1>
<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-left: 2%; ">  </h1>


        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">
                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>

                        <tr>
                            <th scope="row">Nombre del cliente</th>
                            <td>{{$cliente->nombre_cliente}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Número de Identidad</th>
                            <td>{{$cliente->numero_id}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Telefono</th>
                            <td>{{$cliente->telefono}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Número de Carnet</th>
                            <td>{{$cliente->num_carnet}}</td>
                        </tr>

                    </table><br>

                    <div style="text-align: center; ">
                    <a class="btn btn-success" href="/Cliente">Volver</a>
                    <a class="btn btn-primary" href="/cliente/{{$cliente->id}}/update">Actualizar</a>
                    </div>
                    <h1 style="margin-bottom: 2%;"></h1>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection