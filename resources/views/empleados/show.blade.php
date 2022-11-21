@extends('plantilla.principalpag')
@section('pestania', 'Detalle de empleado')
@section('contenido')
@section('TituloPlantillas', 'Detalles del empleado')

<div class="content-wrapper">
    <div class="container-fluid">

        <div style="margin: auto; " class="col-lg-6">
            <div style="margin-top: 15%;" class="card">
                <div class="card-body">

                    <form style="margin-left: 2%;" method="POST" action="">
                        @method('put')
                        @csrf
                        <div>
                            <label for="nombre_completo">Nombre Completo:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombre_completo" id="nombre_completo " placeholder="nombre_completo" value="{{$empleado->nombre_completo}}" maxlength="50" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_cel">Numero de Celular:</label>
                            <input class="form-control " type="text" class="form-control-file" name="numero_cel" id="numero_cel" placeholder="numero_cel" value="{{$empleado->numero_cel}} " maxlength="8" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_tel">Numero de Telefono:</label>
                            <input class="form-control " type="text" class="form-control-file" name="numero_tel" id="numero_tel" placeholder="numero_tel" value="{{$empleado->numero_tel}}" maxlength="8" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="DNI">DNI:</label>
                            <input class="form-control " type="text" class="form-control-file" name="dni" id="dni" placeholder="DNI" value="{{$empleado->DNI}}" maxlength="13" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="direccion">Direccion:</label>
                            <input class="form-control " type="text" class="form-control-file" name="direccion" id="direccion" placeholder="Direccion" value="{{$empleado->direccion}}" maxlength="100" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="email">Correo Electronico:</label>
                            <input class="form-control " type="email" class="form-control-file" name="email" id="email" placeholder="email" value="{{$empleado->correo_electronico}}" maxlength="100" disabled>
                        </div>
                        <hr>
                        <div style="text-align: center">
                            <a class="btn btn-success" href="/empleados">Volver</a>
                            <a class="btn btn-primary" href="/Empleado/{{$empleado->id}}/editar">Actualizar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection