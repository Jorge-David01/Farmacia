@extends('plantilla.principalpag')
@section('pestania', 'Editar empleado')
@section('contenido')


    @if($errors->any())
        <div class="alert alert-danger">

                @foreach($errors->all() as $error)
                    <p>
                      &nbsp;&nbsp;{{$error}}
                    </p>
                @endforeach

        </div>
    @endif


    <h1 style="margin-left: 3% ;  margin-bottom: 3%; ">Editar Empleados </h1>

    <form style="margin-left: 2%;" method="POST" action="">
    @method('put')
        @csrf
        <div class="col-md-6 col-sm-6 ">
        <label for="nombre_completo">Nombre Completo:</label>
            <input type="text" class="form-control-file" name="nombre_completo" id="nombre_completo "
             placeholder="nombre_completo" value="{{$empleado->nombre_completo}}" maxlength="50">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="numero_cel">Numero de Celular:</label>
            <input type="text" class="form-control-file" name="numero_cel" id="numero_cel"
            placeholder="numero_cel" value="{{$empleado->numero_cel}} " maxlength="8">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="numero_tel">Numero de Telefono:</label>
            <input type="text" class="form-control-file" name="numero_tel" id="numero_tel"
            placeholder="numero_tel" value="{{$empleado->numero_tel}}" maxlength="8" >
        </div>
        <div class="col-md-6 col-sm-6 ">
        <label for="DNI">DNI:</label>
            <input type="text" class="form-control-file" name="dni" id="dni"
            placeholder="DNI" value="{{$empleado->DNI}}" maxlength="13">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="direccion">Direccion:</label>
            <input type="text" class="form-control-file" name="direccion" id="direccion"
            placeholder="Direccion" value="{{$empleado->direccion}}"maxlength="100" >
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="email">Correo Electronico:</label>
            <input type="email" class="form-control-file" name="email" id="email"
            placeholder="email" value="{{$empleado->correo_electronico}}" maxlength="100" >
        </div>

        <input style="margin-top: 20px;" type="reset" class="btn btn-danger">
        <a style="margin-top: 20px;" class="btn btn-success" href="/empleados">Regresar</a>
        <button style="margin-top: 20px; margin-left: 10px;" type="submit" class="btn btn-primary">Guardar</button>

</div>

    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
