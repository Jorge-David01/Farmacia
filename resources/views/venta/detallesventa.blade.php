@extends('plantilla.principalpag')
@section('pestania', 'Detalles de la venta')
@section('contenido')




<div class="content-wrapper">
    <div class="container-fluid">

        @if (session('Mensaje'))
            <div class="alert alert-danger">
            {{session('Mensaje')}}
            </div>
        @endif

        <h1 style="margin-left: 2% ; ">Detalles de venta </h1>
        <h1 style="margin-bottom: 2%;"></h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">


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
                            <th>Devolver</th>
                        </tr>

                        <?php
                        $total = 0;
                        ?>

                        @forelse ($detalles as $det)

                        <tr>

                            <td>{{$det->nombre_producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->precio}}</td>
                            <?php $real = (($det->precio * $det->cantidad) * $det->descuento) / 100;
                            ?>
                            <td> {{$real }}</td>
                            <?php $total = ($det->precio * $det->cantidad) - $real;
                            ?>
                            <td> {{$total }} </td>
                            <td> 
                                <button  onclick="cargarproductodevolver({{json_encode($det)}})" 
                                {{$det->cantidad == 0 ? "disabled":""}} data-toggle="modal" data-target="#modalDevolucion" class="btn btn-primary"
                                    >Devolver</button>
                            </td>
                        </tr>

                        @empty
                        <td>No hay resultados</td>
                        @endforelse

                        <?php
                        $total_suma = 0;
                        ?>

                    </table><br>


                    <div style="text-align: center;">
                        <a class="btn btn-success" href="/listaventa">Volver</a>
                    </div>
                    <h1 style="margin-bottom: 2%;"></h1>


<?php
            $total_suma =0;
            ?>


<tr>

</table>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalDevolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:black" id="exampleModalLabel">Modal Devolucion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="display:inline-block;" method="post"  action="{{route('productos.devolver')}}">
      @csrf;
      <div class="modal-body">
        <div style="color:gray" >
            Ingrese la cantidad a devolver de <span id="modal_nombre_producto"></span>, con precio de 
            <span id="modal_precio"></span> y descuento de <span id="modal_descuento"></span>            
        </div>

        <div>                   
            <input hidden type="text" id="modal_id_detalle" name="modal_id_detalle">  
            <input  type="text" id="modal_cantidad" name="modal_cantidad"> 
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit"  onclick="return confirm('¿Está seguro que desea devolver este producto?')" class="btn btn-primary">Devolver</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    function cargarproductodevolver(producto){
        document.getElementById("modal_id_detalle").value = producto['id_detalle'];
        document.getElementById("modal_cantidad").value = producto['cantidad'];
        document.getElementById("modal_descuento").innerHTML = producto['descuento'];
        document.getElementById("modal_precio").innerHTML = producto['precio'];
        document.getElementById("modal_nombre_producto").innerHTML = producto['nombre_producto'];
    }
</script>





                </div>
            </div>
        </div>

    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection