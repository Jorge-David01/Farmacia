@extends('plantilla.principalpag')
@section('pestania', 'Lista de empleados')
@section('contenido')
@section('TituloPlantillas', 'Lista de empleados')

<style>
    td {
        text-align: center;
    }
</style>




<div class="clearfix"></div>
<div style="margin-top: 5%;" class="content-wrapper">
    <div class="container-fluid">
    @if (session('msj'))
                  <div class="alert alert-success">
                                {{session('msj')}}
                            </div>
                            @endif





        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <ul class="nav nav-tabs nav-tabs-primary  nav-justified">


                            <form action="{{route('empleados.index')}}" method="get" style="margin-bottom: 1%;">
                                <div class="form-row">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
                                    </div>
                                    <li class="nav-item">
                                        <input style="margin-left: 1%;" type="submit" class="btn btn-success" value="Buscar">
                                    </li>
                                </div>
                            </form>


                            <li>
                                <a style="margin-left: 2%;" class="btn btn-warning" href="/empleados">Limpiar</a>
                            </li>

                            
                            <li class="nav-item">
                                <button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()" id="descpdf">Descargar PDF</button>
                            </li>

                            <li> <a class="btn btn-warning float-right" href="/empleados/nuevo">Nuevo Empleado</a></li>

                     


                            <script>

                                function pdf(){

                                  window.location.href = "{{route('empleados.pdf')}}";
                                  Swal.fire({
                                    position: 'bottom-end',
                                    icon: 'success',
                                    title: 'Se esta descargando el pdf',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
        timer: {{$employee->lastPage()*100*1}}
                                  })
                                }
                              </script>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
        
      


        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-bordered align-items-center table-flush table-borderless">

                            <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Número de identidad</th>
                                <th>Teléfono</th>
                                <th>Ver detalles</th>
                            </tr>

                            <tbody>
                                @if (count($employee)<=0) <tr>
                                    <td colspan="6">No hay resultados</td>
                                    </tr>
                                    @endif
                            </tbody>

                            @forelse($employee as $emple)

                            <tr style="border: 2px solid #dddddd;">
                                <td class="numero">{{$employee->perPage()*($employee->currentPage()-1)+$loop->iteration}}</td>
                                <td class="letras">{{$emple->nombre_completo}}</td>
                                <td class="numero">{{$emple->DNI}}</td>
                                <td class="numero">{{$emple->numero_cel}}</td>
                                <td> <a class="btn btn-success" href="/Emple/{{$emple->id}}"> Detalles </a></td>
                            </tr>

                            @empty

                            @endforelse





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