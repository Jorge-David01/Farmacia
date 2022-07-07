@extends('plantilla.principalpag')
@section('pestania', 'Formulario de proveedor')

@section('contenido')



<style>
    input:valid {
  border: 2px solid green;
}
input:invalid {
  border: 2px solid #4da9ff;
}
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $messages)
                <li>{{ $messages }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h1 style="margin-left: 3% ; margin-top: 70px; margin-bottom: 3%; "> <u>Creación De Proveedor</u> </h1>




<form  style="margin-left: 3%;" method="POST" action="">

    @csrf

<div  class="form-group">
<label for="nombrepro">Nombre del proveedor:</label>
<input maxlength="70" style="width: 30%"  class="form-control" type="text" id="nombrepro" name="nombrepro" 
title="Ingrese el nombre del proveedor" required="required" placeholder="Ingrese el nombre del proveedor"  >

</div>


<div  class="form-group">
<label for="nombredis">Nombre del distribuidor:</label>
<input maxlength="70" style="width: 30%"  class="form-control" type="text" id="nombredis" name="nombredis" 
title="Ingrese el nombre del distribuidor" required="required" placeholder="Ingrese el nombre del distribuidor"  >

</div>



<div  class="form-group">
<label for="telefonopro">Teléfono del proveedor:</label>
<input minlength="8" maxlength="8" style="width: 30%"  class="form-control" type="tel" id="telefonopro" name="telefonopro" 
title="Ingrese el teléfono del proveedor" required="required" placeholder="Ingrese el teléfono del proveedor"  >

</div>


<div  class="form-group">
<label for="telefonodis">Teléfono del distribuidor:</label>
<input minlength="8" maxlength="8" style="width: 30%"  class="form-control" type="tel" id="telefonodis" name="telefonodis" 
title="Ingrese el teléfono del distribuidor" required="required"   pattern="[9,8,3]{1}[0-9]{7}" placeholder="Ingrese el teléfono del distribuidor"  >

</div>

<div  class="form-group">
<label for="correo">Correo electrónico:</label>
<input maxlength="30" style="width: 30%"  class="form-control" type="email" id="correo" name="correo" 
title="Ingrese el correo del proveedor" required="required" placeholder="Ingrese el correo del proveedor"  >

</div>


<button class="btn btn-primary" href="/Listpro">Volver</button>
<button type="submit" class="btn btn-success">Guardar datos</button>
<input type="reset" class="btn btn-danger">

</form>







@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection