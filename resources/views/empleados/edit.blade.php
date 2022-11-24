@extends('plantilla.principalpag')
@section('pestania', 'Editar empleado')
@section('contenido')
@section('TituloPlantillas', 'Editar empleado')



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

                    <form method="POST" action="">
                        @method('put')
                        @csrf

                        <div>
                            <label for="nombre_completo">Nombre Completo:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombre_completo" id="nombre_completo " placeholder="nombre_completo" value="{{$empleado->nombre_completo}}" maxlength="50" autofocus>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_cel">Numero de Celular:</label>
                            <input class="form-control " type="text" class="form-control-file" name="numero_cel" id="numero_cel" placeholder="numero_cel" value="{{$empleado->numero_cel}} " maxlength="8">
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_tel">Numero de Telefono:</label>
                            <input class="form-control " type="text" class="form-control-file" name="numero_tel" id="numero_tel" placeholder="numero_tel" value="{{$empleado->numero_tel}}" maxlength="8">
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="DNI">DNI:</label>
                            <input class="form-control " type="text" class="form-control-file" name="dni" id="dni" placeholder="DNI" value="{{$empleado->DNI}}" maxlength="13">
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="direccion">Direccion:</label>
                            <input class="form-control " type="text" class="form-control-file" name="direccion" id="direccion" placeholder="Direccion" value="{{$empleado->direccion}}" maxlength="100">
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="email">Correo Electronico:</label>
                            <input class="form-control " type="email" class="form-control-file" name="email" id="email" placeholder="email" value="{{$empleado->correo_electronico}}" maxlength="100">
                        </div>

                        <hr>
                        <div style="text-align: center">
                        <a class="btn btn-warning" href="/empleados">Volver</a>
                            <input type="reset" class="btn btn-danger">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection