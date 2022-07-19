@extends('plantilla.principalpag')
@section('pestania', 'Detalles de compra')
@section('contenido')





<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Detalles de compra</u> </h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >


        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
        <th scope="row">Número de factura</th>
            <td style="background: #0088cc; border: 2px solid #dddddd;">{{$comp->numero_factura}} </td>
          
        </tr>
       
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th>Nombre de producto</th>
            <th>Cantidad</th>
            <th>Lote</th>
            <th>Fecha de vencimiento</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Total</th>
        </tr>


        <?php
            $total =0;
            ?>

        @forelse ($deta as $det)



        <tr>
           
            <td>{{$det->id_producto}}</td>
   
            <td>{{$det->cantidad}}</td>
     
            <td>{{$det->lote}}</td>
      
            <td>{{$det->fecha_vencimiento}}</td>
      
            <td>{{$det->precio_farmacia}}</td>
      
            <td>{{$det->precio_publico}}</td>
            <?php $total = $det->precio_farmacia*$det->cantidad;?>
            <td>  {{$total }} </td>
            


        </tr>
 
        @empty

@endforelse


<tr>



    <td style="background-color: #ff0000">Total</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

    <td></td>
</tr>
</table>



<button style="margin-left: 4%;" class="btn btn-success">
<a class="btn btn-success" href="/listacompra">Volver</a>
</button>

<button class="btn btn-danger">
<form method="post" action="{{route('compra.delete',['id'=>$details->id])}}">
    @csrf
    @method('delete') 
    <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar la compra?')"
    value="Eliminar" class="btn btn-danger" >
</form>
</button>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

