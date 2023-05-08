@extends('plantilla.principalpag')
@section('pestania', 'Formulario de proveedor')

@section('contenido')
@section('TituloPlantillas', 'Registro de proveedores')


<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style=" margin-left: 2%; margin-bottom: 2%;"></h1>

        
        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $messages)
        <li>{{ $messages }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1 style="margin-bottom: 6%;"></h1>
        <div style="margin: auto; margin-bottom: 3%;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="/proveedor/nuevo"    enctype="multipart/form-data">
                  
                        @csrf

                        <div class="form-group">
                            <label for="nombrepro">Nombre del proveedor:</label>

                            <input  class="form-control" type="text" id="nombrepro" name="nombrepro" title="Ingrese el nombre del proveedor" required="required" placeholder="Ingrese el nombre del proveedor"  value="{{old('nombrepro')}}" minlength="5" maxlength="25"  pattern="[A-Za-z ]+" >


                            

                        </div>


                        <div class="form-group">
                            <label for="nombredis">Nombre del distribuidor:</label>
                            <input  pattern="[A-Za-z ]+"   minlength="5" maxlength="25" class="form-control" type="text" id="nombredis" name="nombredis" title="Ingrese el nombre del distribuidor" required="required" placeholder="Ingrese el nombre del distribuidor"  value="{{old('nombredis')}}" minlength="5" maxlength="25">

                        </div>


                        <div class="form-group">
                            <label for="telefonopro">Teléfono del proveedor:</label>
                            <input  minlength="8" maxlength="8" class="form-control" type="tel" id="telefonopro" name="telefonopro" title="Ingrese el teléfono del proveedor" required="required" placeholder="Ingrese el teléfono del proveedor"  value="{{old('telefonopro')}}" pattern="[9,8,3]{1}[0-9]{7}">

                        </div>


                        <div class="form-group">
                            <label for="telefonodis">Teléfono del distribuidor:</label>
                            <input  minlength="8" maxlength="8" class="form-control" type="tel" id="telefonodis" name="telefonodis" title="Ingrese el teléfono del distribuidor" required="required" pattern="[9,8,3]{1}[0-9]{7}" placeholder="Ingrese el teléfono del distribuidor"  value="{{old('telefonodis')}}">

                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico:</label>
                            <input maxlength="30" class="form-control" type="email" id="correo" name="correo" title="Ingrese el correo del proveedor" required="required" placeholder="Ingrese el correo del proveedor"  value="{{old('correo')}}" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">

                        </div>

                        <div class="form-group">
                            <label for="files">Subir PDF</label>
                            <input  class="form-control inputfile inputfile-3" type="file"  id="files" accept="application/pdf" name="files"  >

                        </div>

                <hr>
                        <div style="text-align: center; ">
                            <button class="btn btn-warning" type="button" onclick="window.location='/Listpro'">volver</button>
                            <input type="reset" class="btn btn-danger" class="btn btn-danger" >
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