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
  width: 40%;
}
</style>


<br>
<div class="container" >

<!-- ------------------IMG NUEVO PROVEEDOR---------------- -->
<div style="display: block; width: 100%;  overflow-x: auto;">

 <div class="responsive " >
  <div class="gallery" style="border: 5px solid #000033;">

    <a href="proveedor/nuevo">
      <img  src=" src/Nuevo.jpg" alt="Crear proveedor nuevo">
    </a>
    <div class="card-body text-center">
      <a href="proveedor/nuevo" class="btn btn-warning">Nuevo Proveedor</a>
    </div> 

  </div>
 </div>

 <!-- ------------------IMG LISTA DE PROVEEDORES---------------- -->
 <div class="responsive" >
    <div class="gallery" style="border: 5px solid #000033;">

      <a href="/Listpro">
        <img  src="src/imgLista.jpg" alt="Lista proveedores">
      </a>
      
      <div class="card-body text-center">
      <a href="/Listpro" class="btn btn-warning">Lista Proveedores</a>
    </div>

    </div>
  </div>
</div>
</div>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection