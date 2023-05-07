@extends('plantilla.principalpag')
@section('pestania', 'Editar usuario')
@section('contenido')
@section('TituloPlantillas', 'Editar usuario')



<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">

        @if($errors->any())
        <div class="alert alert-danger">

            @foreach($errors->all() as $error)
            <p>
                &nbsp;&nbsp;{{$error}}
            </p>
            @endforeach

        </div>
        @endif

        <div style="margin: auto; margin-top: 2%;" class="col-6 col-lg-6">
            <div style="margin-top: 15%;" class="card">
                <div class="card-body">


                    <form style="margin-left: 2%;" method="POST" action="">
                        @method('put')
                        @csrf

                        <div>
                            <label for="name">Nombre Completo:</label>
                            <input type="text" class="form-control" name="name" id="name " placeholder="name" value="{{$usuario->name}}" minlength="5" maxlength="20"  autofocus>
                        </div>

                        <div>
                            <label for="email">Correo electronico:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{$usuario->email}}">
                        </div>

                        <hr>
                        <div style="text-align: center">
                        <a  class="btn btn-warning" href="/ListaUsuarios">Volver</a>
                        <button  type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection