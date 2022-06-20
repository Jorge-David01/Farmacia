@extends('madre')
@section('contenido')
    <br>
    <h2>Detalles del empleado: </h2>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
       
        <tr>
            <th scope="row">Nombres</th>
            <td>{{$empleado->nombres}}</td>
        </tr>
        <tr>
           <th scope="row">Apellidos</th>
            <td>{{$empleado->apellidos}}</td>
        </tr>
        <tr>
           <th scope="row">Fecha de Nacimiento</th>
            <td>{{$empleado->fecha_de_nacimiento}}</td>
        </tr>
        <tr>
           <th scope="row">Identidad</th>
            <td>{{$empleado->DNI}}</td>
        </tr>
        <tr>
            <th scope="row">Telefono Personal</th>
            <td>{{$empleado->telefono_personal}}</td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico</th>
            <td>{{$empleado->correo_electronico}}</td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td>{{$empleado->direccion}}</td>
            </tr>
            <tr>
            <th scope="row">Genero</th>
            <td>{{$empleado->genero}}</td>
            </tr>
            <tr>
         
         
</tbody>
</table>

<a class="btn btn-primary" href="/empleados">Volver</a>
<a class="btn btn-primary" href="">Actualizar</a>
<a class="btn btn-primary" href="">Eliminar</a>


@endsection