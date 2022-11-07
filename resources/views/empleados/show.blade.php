@extends('plantilla.principalpag')
@section('pestania', 'Detalle de empleado')
@section('contenido')



<div class="content-wrapper">
    <div class="container-fluid">
    <h1 style="margin-left: 2% "> Detalles del empleado </h1>
        <h1 style="margin-bottom: 2%;"></h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">


                    <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">

                        <thead>

                            <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                                <th scope="col">Campo</th>
                                <th scope="col">Valor</th>
                            </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">Nombre Completo</th>
                                <td>{{$empleado->nombre_completo}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Numero de Celular</th>
                                <td>{{$empleado->numero_cel}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Numero de telefono</th>
                                <td>{{$empleado->numero_tel}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Identidad</th>
                                <td>{{$empleado->DNI}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Direccion</th>
                                <td>{{$empleado->direccion}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Correo electronico</th>
                                <td>{{$empleado->correo_electronico}}</td>
                            </tr>
                        </tbody>
                    </table><br>

                        <div style="text-align: center; ">
                        <a class="btn btn-success" href="/empleados">Volver</a>
                        <a class="btn btn-primary" href="/Empleado/{{$empleado->id}}/editar">Actualizar</a>

                    </div>
                    <h1 style="margin-bottom: 2%;"></h1>
                </div>
            </div>
        </div>

    </div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
