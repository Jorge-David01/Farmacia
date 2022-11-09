@extends('plantilla.principalpag')
@section('pestania', 'Lista de Usuarios')
@section('contenido')


<style>
td {
    text-align: center;
}
</style>

<div class="content-wrapper">
  <div class="container-fluid">
    



        <h1 style="margin-left: 4% ;margin-bottom: 3%; "> Lista de Usuarios </h1>
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

<script>

    function pdf(){

      window.location.href = "{{route('usuarios.pdf')}}";
      Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: 'Se esta descargando el pdf',
        showConfirmButton: false,
        timer: 1500
      })


    }
  </script>


  <div style="float: right;margin-right: 10px; width: 250px">
  <center><button class="btn btn-danger" onclick="pdf()">Descargar PDF</button></center>
    </div>


        <a style="margin-left: 4%; float: right;" class="btn btn-warning" href="/usuarios/nuevo">Nuevo Usuario</a>


       
            <form style="margin-bottom: 2%;" action="{{route('lista')}}" method="get">
            @csrf
            <div class="form-row"]>
                    <div style="margin:left: 0%;" class="col-sm-4">
                        <input  type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
                    </div>
                    </div>
                
              
                    
                
                <input style="margin-top:1%" type="submit" class="btn btn-success" value="Buscar">
                <a style="margin-left: 13%; margin-top: 1%;" class="btn btn-warning" href="/ListaUsuarios">Limpiar</a>
            </form>
        

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

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection