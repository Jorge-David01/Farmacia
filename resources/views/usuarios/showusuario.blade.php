@extends('plantilla.principalpag')
@section('pestania', 'Detalle usuario')
@section('contenido')

<div class="content-wrapper">
    <div class="container-fluid">

        <h1> Detalles del usuario </h1>

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
                                <td>{{$usuario->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Correo electrónico</th>
                                <td>{{$usuario->email}}</td>
                            </tr>
                        

                        </tbody>
                    </table><br>



                    <div style="text-align: center; ">

                        <a class="btn btn-success" href="/ListaUsuarios">Volver</a>


                        <a class="btn btn-primary" href="/Usuario/{{$usuario->id}}/editar">Actualizar</a>


                        <form style="display:inline-block;" method="post" action="{{route('usuarios.delete',['id'=>$usuario->id])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar el usuario?')" value="eliminar" class="btn btn-danger">
                        </form>

                    </div>
                    <h1 style="margin-bottom: 2%;"></h1>
                </div>
            </div>
        </div>

    </div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection