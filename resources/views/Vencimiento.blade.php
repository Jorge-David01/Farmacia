@extends('plantilla.principalpag')
@section('pestania', 'Ventana de proveedores')
@section('contenido')

<h1 style="margin-left: 4% ; margin-bottom: 3%; ">Fecha de vencimientos</h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >


        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
        <th scope="row">Nombre del producto</th>
            <td style="background: #0088cc; border: 2px solid #dddddd;"></td>
        </tr>

       
       
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;"> 
            <th>Lote</th>
            <th>Fecha de vencimiento</th>
        </tr>

        @forelse ($detas as $det)

        <tr>
            <td>{{$det->lote}}</td>
            <td>{{$det->fecha_vencimiento}}</td>
        </tr>
 
        @empty
       
@endforelse

</table>

<button  style="margin-left: 4%;" class="btn btn-success">
<a class="btn btn-success" href="/inventarioVista">Volver</a>
</button>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection