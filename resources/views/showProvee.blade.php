@extends('plantilla.principalpag')
@section('pestania', 'Ventana de proveedores')
@section('contenido')
@section('TituloPlantillas', 'Detalles del proveedor')


<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-bottom: 6%;"></h1>

        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <div>
                        <label style="margin-top: 3%;" for="Nombre_del_proveedor">Nombre del Proveedor:</label>
                        <input class="form-control " type="text" class="form-control-file" name="nombrepro" id="nombrepro" placeholder="Nombre_del_proveedor" value="{{$provee->Nombre_del_proveedor}}" maxlength="50" disabled>
                    </div>

                    <div>
                        <label style="margin-top: 3%;" for="Nombre_del_distribuidor">Nombre del Distribuidor:</label>
                        <input class="form-control " type="text" class="form-control-file" name="nombredis" id="nombredis" placeholder="Nombre_del_distribuidor" value="{{$provee->Nombre_del_distribuidor}}" maxlength="50" disabled>
                    </div>

                    <div>
                        <label style="margin-top: 3%;" for="Telefono_del_proveedor">Telefono del Proveedor:</label>
                        <input class="form-control " type="text" class="form-control-file" name="telefonopro" id="telefonopro" placeholder="Telefono_del_proveedor" value="{{$provee->Telefono_del_proveedor}}" maxlength="8" disabled>
                    </div>

                    <div>
                        <label style="margin-top: 3%;" for="Telefono_del_distribuidor">Telefono del Distribuidor:</label>
                        <input class="form-control " type="text" class="form-control-file" name="telefonodis" id="telefonodis" placeholder="Telefono_del_distribuidor" value="{{$provee->Telefono_del_distribuidor}}" maxlength="8" disabled>
                    </div>

                    <div>
                        <label style="margin-top: 3%;" for="Correo_electronico">Correo Electronico:</label>
                        <input class="form-control " type="text" class="form-control-file" name="correo" id="correo" placeholder="Correo_electronico" value="{{$provee->Correo_electronico}}" disabled>
                    </div>

                    <div>
                        <label style="margin-top: 3%;" for="files">Catálogo:</label>
                        <a href="/Archivos/{{$provee->Archivo}}" target="blank_"> <input type="text" class="form-control " name="existente" id="existente" value="{{$provee->Archivo}}" readonly></a>
                    </div>

                    <hr>
                    <div style="text-align: center">
                        <a class="btn btn-success" href="/Listpro">Volver</a>
                        <a class="btn btn-primary" href="/Editprovee/{{$provee->id}}/editar">Actualizar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection