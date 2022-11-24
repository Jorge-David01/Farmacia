@extends('plantilla.principalpag')
@section('pestania', 'Editar proveedor')
@section('contenido')
@section('TituloPlantillas', 'Editar proveedor')

<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-bottom: 6%;"></h1>

        <h1 style="margin-bottom: 2%;"></h1>
        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">

                        @foreach($errors->all() as $error)
                        <p>
                            {{$error}}
                        </p>
                        @endforeach

                    </div>
                    @endif



                    <form style="margin-left: 2%;" method="POST" action="" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div>
                            <label for="Nombre_del_proveedor">Nombre del Proveedor:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombrepro" id="nombrepro" placeholder="Nombre_del_proveedor" value="{{$proveedor->Nombre_del_proveedor}}" maxlength="50" autofocus>
                        </div>

                        <div>
                            <label for="Nombre_del_distribuidor">Nombre del Distribuidor:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombredis" id="nombredis" placeholder="Nombre_del_distribuidor" value="{{$proveedor->Nombre_del_distribuidor}}" maxlength="50">
                        </div>

                        <div>
                            <label for="Telefono_del_proveedor">Telefono del Proveedor:</label>
                            <input class="form-control " type="text" class="form-control-file" name="telefonopro" id="telefonopro" placeholder="Telefono_del_proveedor" value="{{$proveedor->Telefono_del_proveedor}}" maxlength="8">
                        </div>

                        <div>
                            <label for="Telefono_del_distribuidor">Telefono del Distribuidor:</label>
                            <input class="form-control " type="text" class="form-control-file" name="telefonodis" id="telefonodis" placeholder="Telefono_del_distribuidor" value="{{$proveedor->Telefono_del_distribuidor}}" maxlength="8">
                        </div>

                        <div>
                            <label for="Correo_electronico">Correo Electronico:</label>
                            <input class="form-control " type="text" class="form-control-file" name="correo" id="correo" placeholder="Correo_electronico" value="{{$proveedor->Correo_electronico}}">
                        </div>

                        <div>
                            <label for="files">Catálogo</label>
                            <a href="/Archivos/{{$proveedor->Archivo}}" target="blank_"> <input type="text" class="form-control " name="existente" id="existente" value="{{$proveedor->Archivo}}" readonly></a>
                            <input style="margin-top:3%; background-color:#374d62; margin-bottom: 3%;" type="file" accept="application/pdf" class="form-control-file" name="files" id="files" value="{{$proveedor->Archivo}}" multiple>
                        </div>
                        
                        <hr>
                        <div style="text-align: center">
                        <a class="btn btn-warning" href="/Listpro">Volver</a>
                            <input type="reset" class="btn btn-danger">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        <h1 style="margin-bottom: 2%;"></h1>

                    </form>

                </div>
            </div>
        </div>
    </div>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
    @endsection