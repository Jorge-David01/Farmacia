@extends('plantilla.principalpag')
@section('pestania', 'Ventana de proveedores')
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
<div class="container" >

<!-- ------------------IMG NUEVO PROVEEDOR---------------- -->
 <div class="responsive " >
  <div class="gallery" style="border: 5px solid #000033;">
    <a href="#">
      <img src=" src/Nuevo.jpg" width="600" height="400" alt="Crear proveedor nuevo">
    </a>
    <b class="fst-italic" style=" font-size: 20px; ">Nuevo proveedor</b>
  </div>
 </div>

 <!-- ------------------IMG LISTA DE PROVEEDORES---------------- -->
 <div class="responsive" >
    <div class="gallery" style="border: 5px solid #000033;">

      <a href="/Listpro">
        <img  src="src/imgLista.jpg" width="600" height="400" alt="Lista proveedores">
      </a>
      <b class="fst-italic " style="font-size: 20px; text-align: center;">Lista de proveedores</b>
      
    </div>
  </div>
</div>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection