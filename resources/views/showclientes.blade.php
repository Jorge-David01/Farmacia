@extends('plantilla.principalpag')
@section('pestania', 'Detalles del cliente')
@section('contenido')
@section('TituloPlantillas', 'Detalles del cliente')



<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-bottom: 6%;"></h1>


        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form style="margin-left: 2%;" method="POST" action="">
                        @method('put')
                        @csrf
                        <div>
                            <label style="margin-top: 3%;" for="nombre_cliente">Nombre del cliente:</label>
                            <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre del cliente" value="{{$cliente->nombre_cliente}}" minlength="6" maxlength="50" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_identidad">Numero de identidad:</label>
                            <input type="number " class="form-control" name="numero_identidad" id="numero_identidad" placeholder="Número de identidad " value="{{$cliente->numero_id}}" minlength="13" maxlength="13" pattern="[0-1]{1}[0-9]{1}[0-2]{1}[0-9]{10}" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_tel">Numero de Telefono:</label>
                            <input type="text" class="form-control" name="numero_tel" id="numero_tel" placeholder="Número de teléfono" value="{{$cliente->telefono}}" minlength="8" maxlength="8" pattern="[2,9,8,3]{1}[0-9]{7}" disabled>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="{{$cliente->direccion}}" minlength="10" maxlength="200" disabled>
                        </div>

                        <hr>
                        <div style="text-align: center">
                            <a class="btn btn-success" href="/Cliente">Volver</a>
                            <a class="btn btn-primary" href="/cliente/{{$cliente->id}}/update">Actualizar</a>
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