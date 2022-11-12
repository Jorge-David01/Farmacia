@extends('plantilla.principalpag')
@section('pestania', 'Caja de Alivio')
@section('contenido')


<style>
  td {
    text-align: center;
  }
</style>





<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style=" margin-bottom: 1%; margin-left: 2%;"> Caja de alivio </h1>
    
    @if (session('mensaje'))
<div class="alert alert-success">
  {{session('mensaje')}}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
    
    <form action="{{route('caja.answer')}}" method="POST">
    @csrf
    <div>
<label for="">¿Desea vaciar la caja de alivio?</label>
</div>
<div>
<input type="radio" value="Sí" name="Answer"> Sí
<input type="radio" value="Nooo" name="Answer"  checked > No
</div>

<input name ="botón" class="btn btn-success" data-toggle="modal" style="margin-top:1%" type="submit" value="Vaciar">


    </form>

    </div>
</div>
</div>



    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">

   


          <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">


            <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
              <th>Descripción</th>
              <th>Vez #</th>
              <th>Fecha</th>
            </tr>
          
            @forelse($cajadatos as $datos)


          
            <tr style="border: 2px solid #dddddd;">
              <td>{{$datos->Descripcion}}</td>
              <td>{{$loop->index+1}}</td>
              <td>{{$datos->Fecha}}</td>
            </tr>

           
            @empty

            @endforelse

         
            </tbody>
          </table>
          
      

        </div>
        {{$cajadatos -> links() }}
      </div>
    </div>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection