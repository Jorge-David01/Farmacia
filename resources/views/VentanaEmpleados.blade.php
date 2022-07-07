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
  width: 30%;
}
</style>


<br>
<div class="container body" >


<div style="display: block; width: 100%;  overflow-x: auto;">
<!-- ------------------IMG NUEVO EMPLEADO---------------- -->
 <div class="responsive " >
  <div class="gallery" style="border: 5px solid #000033;">
    <a href="/empleados/nuevo">
      <img src=" src/Nuevo.jpg" width="600" height="400" alt="Crear empleado nuevo">
    </a>
    <b class="fst-italic" style=" font-size: 20px; ">Nuevo empleado</b>
  </div>
 </div>
 
 <!-- ------------------IMG LISTA DE EMPLEADO---------------- -->
 <div class="responsive" >
    <div class="gallery" style="border: 5px solid #000033;">

      <a href="/Lista">
        <img  src="src/imgLista.jpg" width="600" height="400" alt="Lista empleados">
      </a>
      <b class="fst-italic " style="font-size: 20px; text-align: center;">Lista de empleados</b>
      
    </div>
  </div>
</div>
</div>
<div class="clearfix"></div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
