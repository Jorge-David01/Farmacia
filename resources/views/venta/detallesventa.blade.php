@extends('plantilla.principalpag')
@section('pestania', 'Detalles de la venta')
@section('contenido')





<h1 style="margin-left: 4% ; margin-bottom: 3%; "> Detalles de compra </h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >


        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
        <th scope="row">Número de factura:</th>
            <td style="background: #0088cc; border: 2px solid #dddddd;">{{$factu->numero_factura}}</td>
          
        </tr>

        
        
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Descuento</th>
            <th>Total</th>
            
            
        </tr>


        <?php
            $total =0;
            ?>

     
@forelse ($detalles as $det)
        

        <tr>
           
            
            <td>{{$det->id_producto}}</td>
     
            <td>{{$det->cantidad}}</td>
      
            <td>{{$det->precio}}</td>
            <td>{{$det->descuento}}</td>
      
      
            
            <?php $total = ($det->precio * $det->cantidad) - $det->descuento ;
        
         
            ?>


            <td>  {{$total }} </td>

            
        </tr>
        
    
       
        @empty
       
@endforelse



<?php
            $total_suma =0;
            ?>


<tr>




</table>



<button style="margin-left: 4%;" class="btn btn-success">
<a class="btn btn-success" href="/listaventa">Volver</a>
</button>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

