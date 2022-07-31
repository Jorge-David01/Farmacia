@extends('plantilla.principalpag')
@section('pestania', 'Ventana de empleados')
@section('contenido')

<style>
div.gallery img {
  width: 100%;
  height: auto;
}

.responsive {
  padding: 50px;
  float: left;
  width: 40%;
}
</style>


<br>
<div class="container body" >


<div style="display: block; width: 100%;  overflow-x: auto;">
<!-- ------------------IMG NUEVO EMPLEADO---------------- -->
 <div class="responsive " >
  <div class="gallery" style="border: 5px solid #000033;">
    <a href="/empleados/nuevo">
      <img src=" src/Nuevo.jpg" alt="Crear empleado nuevo">
    </a>
    <div class="card-body text-center">
      <a href="/empleados/nuevo" class="btn btn-warning">Agregar empleado</a>
    </div>
  </div>
 </div>
 

<!-- ------------------IMG LISTA DE EMPLEADO---------------- -->
 <div class="responsive" >
    <div class="gallery" style="border: 5px solid #000033;">
      <a href="/Lista">
        <img  src="src/imgLista.jpg" alt="Lista empleados">
      </a>
      <div class="card-body text-center">
        <a href="/Lista" class="btn btn-warning">lista de empleado</a>
      </div> 
    </div>
  </div>

</div>
</div>
<div class="clearfix"></div>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
