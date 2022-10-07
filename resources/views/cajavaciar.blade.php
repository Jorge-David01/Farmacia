@extends('plantilla.principalpag')
@section('pestania', 'Caja de Alivio')
@section('contenido')


<h1 style="margin-top: 5%; margin-left: 3%;">Vaciar caja de alivio</h1>
<form  style="margin-left: 3%;" method="POST" action="">
@csrf
<div  class="form-group">
<label for="nombrepro">¿Desea vaciar caja de alivio?</label>
<input minlength="2" maxlength="2" style="width: 10%"  class="form-control" type="text" id="cajaalivio" name="cajaalivio" 
 required="required" placeholder="Ingrese si para vaciar la caja"  >
 <button style="margin-top: 2%" type="submit" >Vaciar</button>
</div>


</form>





@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection