@extends('plantilla.principalpag')
@section('pestania', 'Lista de permisos')
@section('contenido')

<div class="x_content">

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

    <style>
        td {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
        <div class="container-fluid">

            <h1 style=" margin-bottom: 3%; "> Lista de permisos </h1>
            <a class="btn btn-warning" href="/permissionsnuevo">Nuevo permiso</a>

            <h1 style="margin-bottom: 2%;"></h1>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">

                        <div class="table-responsive">

                            <table class="table align-items-center table-flush table-borderless">

                                <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                <tbody>
                                    @forelse ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning"><i class="material-icons">editar</i></a>
                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                <i class="material-icons">eliminar</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            <div style=" margin-bottom: 3%; " {!! $permissions->links()!!} </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection