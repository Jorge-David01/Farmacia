@extends('plantilla.principalpag')
@section('pestania', 'Ayuda')
@section('contenido')
@section('TituloPlantillas', 'Pregunta generales')


<div style="margin-top: 5%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" class="container">
  
  <div id="accordion">

  <h1 style="margin-bottom: 6%;"></h1>
    <div style=" text-align: left;" class="card bg-transparent">
      <div class="card-header">
         <a class="card-link" data-toggle="collapse" href="#collapseOne">
         ¿Se puede recuperar un dato eliminado?
         </a>
        </div>

      <div style=" text-align: left;" id="collapseOne" class="collapse show" data-parent="#accordion">
         <div class="card-body">
         <p>No se pueden recuperar los datos eliminados, una vez que se borran toda la información de estos desaparece.</p>
        </div>
      </div>
    </div>

    <div style=" text-align: left;" class="card bg-transparent">
      <div class="card-header">
        <a style=" text-align: left;" class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        ¿Se pueden dejar campos vació en los formularios? 
      </a>
    </div>

    <div style=" text-align: left;" id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
       <p>No se pueden dejar campos vació, toda la información solicitada es obligatoria.</p>
        </div>
      </div>
    </div>

    <div style=" text-align: left;" class="card bg-transparent">
      <div class="card-header ">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
        ¿Puedo agregar y quitar campos en los formularios?
        </a>
      </div>
      <div style=" text-align: left;" id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
       <p>Si se puede, pero para esto debe de hacerlo una persona que tenga conocimientos sobre el sistema.</p>
    </div>
      </div>
    </div>
  </div>
</div>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection