@extends('plantilla.principalpag')
@section('pestania', 'Formulario de proveedor')

@section('contenido')

<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style=" margin-left: 2%; margin-bottom: 2%;">Registro de proveedor </h1>

        
        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $messages)
        <li>{{ $messages }}</li>
        @endforeach
    </ul>
</div>
@endif

        
        <div style="margin: auto; margin-bottom: 3%;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="/proveedor/nuevo"    enctype="multipart/form-data">
                  
                        @csrf

                        <div class="form-group">
                            <label for="nombrepro">Nombre del proveedor:</label>

                            <input maxlength="70"  class="form-control" type="text" id="nombrepro" name="nombrepro" title="Ingrese el nombre del proveedor" required="required" placeholder="Ingrese el nombre del proveedor"  value="{{old('nombrepro')}}">


                            

                        </div>


                        <div class="form-group">
                            <label for="nombredis">Nombre del distribuidor:</label>
                            <input maxlength="70" class="form-control" type="text" id="nombredis" name="nombredis" title="Ingrese el nombre del distribuidor" required="required" placeholder="Ingrese el nombre del distribuidor"  value="{{old('nombredis')}}">

                        </div>


                        <div class="form-group">
                            <label for="telefonopro">Teléfono del proveedor:</label>
                            <input minlength="8" maxlength="8" class="form-control" type="tel" id="telefonopro" name="telefonopro" title="Ingrese el teléfono del proveedor" required="required" placeholder="Ingrese el teléfono del proveedor"  value="{{old('telefonopro')}}">

                        </div>


                        <div class="form-group">
                            <label for="telefonodis">Teléfono del distribuidor:</label>
                            <input minlength="8" maxlength="8" class="form-control" type="tel" id="telefonodis" name="telefonodis" title="Ingrese el teléfono del distribuidor" required="required" pattern="[9,8,3]{1}[0-9]{7}" placeholder="Ingrese el teléfono del distribuidor"  value="{{old('telefonodis')}}">

                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico:</label>
                            <input maxlength="30" class="form-control" type="email" id="correo" name="correo" title="Ingrese el correo del proveedor" required="required" placeholder="Ingrese el correo del proveedor"  value="{{old('correo')}}">

                        </div>

                        <div class="form-group">
                            <label for="files">Subir PDF</label>
                            <input class="form-control" type="file"  id="files" accept="application/pdf" name="files"  >

                        </div>

                
                        <div style="text-align: center; ">
                            <button class="btn btn-primary" href="/Listpro">Volver</button>
                            <button type="submit" class="btn btn-success">Guardar datos</button>
                            <input type="reset" class="btn btn-danger">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>





@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection