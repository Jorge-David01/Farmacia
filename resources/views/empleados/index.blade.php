@extends('plantilla.principalpag')
@section('pestania', 'Lista de empleados')
@section('contenido')


<style>
    td {
        text-align: center;
    }
</style>




<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">


        <h1 style=" margin-left: 2%; margin-bottom: 3%;"> Lista de empleados </h1>

        <a class="btn btn-warning" href="/empleados/nuevo">Nuevo Empleado</a>
        <br>
        <br>

        <div class="col-x1-12">
            <form action="{{route('empleados.index')}}" method="get" style="margin-top: 1%; width: 78%; margin-bottom:2%; ">
                <div class="form-row">
                    <div style="  margin-left: 0%" class="col-sm-2">
                        <input type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>
        </div>

        @if (session('Mensaje'))
        <div class="alert alert-danger">
            {{session('Mensaje')}}
        </div>
        @endif

        </style>
        @if (session('msj'))
        <div class="alert alert-success">
            {{session('msj')}}
        </div>
        @endif

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">

                            <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                                <th>Nombre</th>
                                <th>Número de identidad</th>
                                <th>Teléfono</th>
                                <th>Ver detalles</th>
                            </tr>

                            <tbody>
                                @if (count($employee)<=0) <tr>
                                    <td colspan="6">No hay resultados</td>
                                    </tr>
                                    @endif
                            </tbody>

                            @forelse($employee as $emple)

                            <tr style="border: 2px solid #dddddd;">
                                <td>{{$emple->nombre_completo}}</td>
                                <td>{{$emple->DNI}}</td>
                                <td>{{$emple->numero_cel}}</td>
                                <td> <a class="btn btn-success" href="/Emple/{{$emple->id}}"> Detalles </a></td>
                            </tr>

                            @empty

                            @endforelse


                            {{$employee -> links() }}



                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection