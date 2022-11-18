@extends('plantilla.principalpag')
@section('pestania', 'Caja de Alivio')
@section('contenido')
@section('TituloPlantillas', 'Vaciar caja de alivio')

<h1 style="margin-bottom: 6%;"></h1>
<div class="content-wrapper">
    <div class="container-fluid">
        

        <h1 style="margin-bottom: 2%;"></h1>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <form style="margin-left: 1%;" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="nombrepro">¿Desea vaciar caja de alivio?</label>
                            <input style="display:none;" minlength="2" maxlength="2" style="width: 18%" class="form-control" type="text" id="cajaalivio" name="cajaalivio" required="required" value="Sí" placeholder="Ingrese si para vaciar la caja">
                       
                        </div>
                        <button class="btn btn-success" style=" margin-bottom: 3%;"  type="submit">Vaciar</button>

                        <a style ="margin-left: 3%; margin-bottom: 3%;" class="btn btn-primary" href="/CajaAlivio">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection