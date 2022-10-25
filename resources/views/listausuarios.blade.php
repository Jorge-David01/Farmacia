@extends('plantilla.principalpag')
@section('pestania', 'Lista de Usuarios')
@section('contenido')


<style>
td {
    text-align: center;
}
</style>

@if (session('Mensaje'))
<div class="alert alert-danger">
  {{session('Mensaje')}}
</div>
@endif


@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif


<div class="content-wrapper">
  <div class="container-fluid">

        <h1 style="margin-left: 4% ;margin-bottom: 3%; "> Lista de Usuarios </h1>
        <a style="margin-left: 4%;" class="btn btn-warning" href="/usuarios/nuevo">Nuevo Usuario</a>

        <div class="col-x1-12" style="margin-top: 2%;">
            <form action="{{route('lista')}}" method="get">
                <div class="form-row">
                    <div class="col-sm-2">
                        <input  type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto">
                <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>
        </div>


        <div class="row" >
        <div class="col-12 col-lg-12">
        <div class="card" >
        <div class="table-responsive">

            <table class="table align-items-center table-flush table-borderless">
                            
                <thead>
                <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Ver detalles</th>
                <th></th>
                </tr>
                </thead>

                    @if (count($employee)<=0)
                        <tr>
                            <td colspan="6">No hay resultados</td>
                    </tr>
                    @endif

                <tbody>
                    @foreach($employee as $user)

                    <tr style="border: 2px solid #dddddd;">
                    <td>{{$loop->index+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td > <a  class="btn btn-success" href="/Showuser/{{$user->id}}"> Detalles </a></td>
                    <td > <a  class="btn btn-success" href="/contrasenia/{{$user->id}}/listausuarios"> Cambiar Contrasena </a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{$employee -> links() }}
                        
        </div>
        </div>
        </div>
        </div>


    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection