@extends('plantilla.principalpag')
@section('pestania', 'VentanaEmpleados')
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
<div class="responsive" >
  <div class="gallery" style="border: 5px solid #000033;">
    <a href="/empleados/nuevo">
      <img src="https://img.freepik.com/vector-gratis/ilustracion-vectorial-formulario-solicitud-empleo-gente-selecciona-curriculum-trabajo_545399-828.jpg" width="600" height="400">
    </a>
    <b style="font-size: 20px;">Agregar nuevo empleado</b>
  </div>
</div>

<div class="responsive" >
  <div class="gallery" style="border: 5px solid #000033;">
    <a href="/Principal">
      <img src="https://thumbs.dreamstime.com/b/cv-curr%C3%ADculum-vitae-como-del-empleado-para-vacantes-de-empleo-concepto-persona-diminuta-plana-proceso-hr-contrataci%C3%B3n-con-205990425.jpg" width="600" height="400">
    </a>
    <b style="font-size: 20px">Lista de empleados</b>
  </div>
</div>
</div>

<div class="clearfix"></div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection