@extends('plantilla.principalpag')
@section('pestania', 'Inventario')
@section('contenido')


<style>
td {
  text-align: center;
}
</style>


<div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">

<h1 style=" margin-bottom: 3%; margin-left: 2%;"> Inventario </h1>

<form action="{{route('busqueda')}}" method="POST" style="margin-top: 1%; width: 78%;">
@csrf
<input type="text" name="good" id="good" placeholder="Busqueda">
<input style="margin-left: 15px" type="submit" value="Buscar" class="btn btn-success">
</form>

<h1 style="margin-bottom: 2%;"></h1>

	<div class="row" >
	<div class="col-12 col-lg-12">
	<div class="card" >
		 

	<div class="table-responsive">

  <table class="table align-items-center table-flush table-borderless">



<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th >id producto</th>
<th >Cantidad</th>



<!--<th>Precio</th>
<th>Vencimiento</th> -->
</tr>

<tbody>
    @if (count($Inventa)<=0)
        <tr>
            <td colspan="4">No hay resultados</td>
    </tr>
    @endif
</tbody>





@forelse($Inventa as $listaInv)

<tr style="border: 2px solid #dddddd;">
<td> {{$listaInv->  id_producto}} </td>
<td> {{$listaInv->  cantidad}}</td>



<!--  <td> <a  class="btn btn-success" href="/Precio/{{$listaInv->id}}"> Precio unitario </a></td>
<td > <a  class="btn btn-success" href="/vencimiento/{{$listaInv->id}}"> fecha de vencimiento </a></td> 
</tr> -->




@empty



@endforelse



{{$Inventa -> links() }}



</tbody>

</table>

                
</div>
</div>
</div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection