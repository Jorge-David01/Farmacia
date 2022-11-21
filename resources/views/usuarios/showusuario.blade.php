@extends('plantilla.principalpag')
@section('pestania', 'Detalle usuario')
@section('contenido')
@section('TituloPlantillas', 'Detalles del usuario')


<div class="content-wrapper">
    <div class="container-fluid">


        <div style="margin: auto; margin-top: 2%;" class="col-6 col-lg-6">
            <div style="margin-top: 15%;" class="card">
                <div class="card-body">


                    <form style="margin-left: 2%;" method="POST" action="">
                        @method('put')
                        @csrf

                        <div>
                            <label for="name">Nombre Completo:</label>
                            <input type="text" class="form-control" name="name" id="name " placeholder="name" value="{{$usuario->name}}" maxlength="50" disabled>
                        </div>

                        <div>
                            <label for="email">Correo electronico:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{$usuario->email}}" disabled>
                        </div>

                        <hr>
                        <div style="text-align: center">
                            <a class="btn btn-success" href="/ListaUsuarios">Volver</a>


                            <a class="btn btn-primary" href="/Usuario/{{$usuario->id}}/editar">Actualizar</a>


                            <form style="display:inline-block;" method="post" action="{{route('usuarios.delete',['id'=>$usuario->id])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar el usuario?')" value="eliminar" class="btn btn-danger">
                            </form>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection