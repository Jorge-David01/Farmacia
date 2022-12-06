@extends('plantilla.principalpag')
@section('pestania', 'Lista de devoluciones')
@section('contenido')
@section('TituloPlantillas', 'Devoluciones')
<style>
td {
    text-align: center;
}
</style>


@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif



<li class="nav-item">
<input style="margin-top: 1%" type="submit" value="Buscar" class="btn btn-success">
</li>

</div>
</form>

<li>
<a style="margin-left: 2%;" class="btn btn-warning" href="/Devolucion">Limpiar</a>
</li>


<div style="float: right;margin-top: 20px">
    <center><button class="btn btn-danger" id="descpdf" onclick="pdf()">Descargar PDF</button></center>

  </div>

  <script>
    setInterval('fg()', 1000);
    function fg(){
      document.getElementById('dat').innerHTML = "{{url()->previous();}}";
    }

    function pdf(){

      window.location.href="{{route('devolucionProducto.pdf')}}";
      Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: 'Se esta descargando el pdf',
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: {{$lisdevolucion->lastPage()*100*1}}
      })

    }
  </script>


	<div class="table-responsive">

    <table class="table table-bordered align-items-center table-flush table-borderless">
<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>#</th>
<th>Id Venta</th>
<th>Id Producto</th>
<th>Cantidad</th>
<th>Descuento</th>
<th>Precio</th>
</tr>

<tbody>
    @if (count($lisdevolucion)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($lisdevolucion as $devolucion)


<tr style="border: 2px solid #dddddd;">
<td>{{$lisdevolucion->perPage()*($lisdevolucion->currentPage()-1)+$loop->iteration}}</td>
<td> {{$devolucion->id_venta}} </td>
<td>  {{$devolucion->id_producto}} </td>
<td>  {{$devolucion->cantidad}}  </td>
<td>  {{$devolucion->descuento}}  </td>
<td>  {{$devolucion->precio}}  </td>

</tr>

@empty

@endforelse



</tbody>

</table>

                
</div>
</div>
{{$lisdevolucion -> links() }}
</div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection