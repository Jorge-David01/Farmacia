@extends('plantilla.principalpag')
@section('pestania', 'Editar producto')
@section('contenido')

<br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <h1 style="margin-left: 2% ; margin-top: 40px; margin-bottom: 3%; "> <u>Editar Producto</u> </h1>

    <form style="margin-left: 2%;" method="POST" action="">
        @method('put')
        @csrf

    
        <div class="col-md-6 col-sm-6 ">
        <label for="id_proveedor">Nombre del Proveedor:</label>
            <input type="text" class="form-control-file" name="nombrepro" id="nombrepro" 
            placeholder="id_proveedor" value="{{$producto->id_proveedor}}">
        </div>


        <div class="col-md-6 col-sm-6 ">
        <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" class="form-control-file" name="nombre_producto" id="nombre_producto" 
            placeholder="nombre_producto" value="{{$producto->nombre_producto}}">
        </div>
        
        <div class="col-md-6 col-sm-6 ">
        <label for="principio_activo">Principio Activo:</label>
            <input type="text" class="form-control-file" name="principio_activo" id="principio_activo" 
            placeholder="principio_activo" value="{{$producto->principio_activo}}" >
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="Descripcion">Descripcion:</label>
            <input type="text" class="form-control-file" name="Descripcion" id="Descripcion" 
            placeholder="Descripcion" value="{{$producto->Descripcion}}" >
        </div>


        <div style="margin-top: 20px;">

        <button style=" margin-left: 10px;" type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">
        <a class="btn btn-success" href="/Producto">Regresar</a>


</div>
      
    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection