@extends('plantilla.principalpag')
@section('pestania', 'Detalles del producto')
@section('contenido')


<br>
<h2 style="margin-left: 37% ; margin-top: 1%; margin-bottom: 3%;" >Detalles del producto</h2> 

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >
        <tr style="background: #d9d9d9">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
       
        <tr>
            <th scope="row">Nombre del proveedor</th>
            <td>{{$details->id_proveedor}}</td>
        </tr>

        <tr>
           <th scope="row">Nombre del producto</th>
            <td>{{$details->nombre_producto}}</td>
        </tr>

        <tr>
           <th scope="row">Principio activo</th>
            <td>{{$details->principio_activo}}</td>
        </tr>

        <tr>
            <th scope="row">Descripción</th>
            <td>{{$details->descripcion}}</td>
        </tr>

       
</table>



<a  class="btn btn-success" href="/Producto">Volver</a>



<a style="display:inline-block;margin-left:1%;" class="btn btn-primary" href="">Actualizar</a>




<form style=" float:left; margin-right:1%; margin-left:4%" method="post" action="{{route('delete.producto',['id'=>$details->id])}}">
    @csrf
    @method('delete') 
    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Está seguro que desea eliminar el empleado?')"
    value="eliminar" class="btn btn-danger" >
</form>
</button>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
