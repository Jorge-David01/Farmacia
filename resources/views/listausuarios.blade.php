@extends('plantilla.principalpag')
@section('pestania', 'Lista de Usuarios')
@section('contenido')
@section('TituloPlantillas', 'Lista de Usuarios')

<style>
td {
    text-align: center;
}



</style>





<div class="content-wrapper">
  <div class="container-fluid">
    



        <h1 style="margin-left: 4% ;margin-bottom: 2%; ">  </h1>




<h1 style="margin-bottom: 6%;"></h1>


@if (session('msj'))
<div  class="alert alert-success">
  {{session('msj')}}
  </div>
@endif

<div class="row">





            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <ul class="nav nav-tabs nav-tabs-primary  nav-justified">


       
            <form style="margin-bottom: 1%;" action="{{route('lista')}}" method="get">
            @csrf
            <div class="form-row"]>
            <div class="col-sm-8">
                        <input  type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
                    </div>
               
              <li class="nav-item">
                <input style="margin-left:1%" type="submit" class="btn btn-success" value="Buscar">
           </li>
           </div>
            </form>
        


              <li>
            <a style="margin-left: 2%;" class="btn btn-warning" href="/ListaUsuarios">Limpiar</a>

            </li>

            <li class="nav-item">
            <button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()" id="descpdf">Descargar PDF</button>
             </li>


             <li>
             <a class="btn btn-warning float-right" href="/usuarios/nuevo">Nuevo Usuario</a>

             </li>







            
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

  document.getElementById('descpdf').disabled = true;
}
</script>

            </ul>

</div>
</div>
</div>
</div>

        <div class="row" >
        <div class="col-12 col-lg-12">
        <div class="card" >
        <div class="table-responsive">

            <table class="table table-bordered align-items-center table-flush table-borderless">
                            
                <thead>
                <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Ver detalles</th>
                <th>Cambio de contraseña</th>
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
                    <td>{{$employee->perPage()*($employee->currentPage()-1)+$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td > <a  class="btn btn-success" href="/Showuser/{{$user->id}}">Detalles</a></td>
                    <td > <a  class="btn btn-success" href="/contrasenia/{{$user->id}}/listausuarios">Cambiar</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

    
                        
        </div>
        </div>
        {{$employee -> links() }}
        </div>
        </div>


    </div>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection