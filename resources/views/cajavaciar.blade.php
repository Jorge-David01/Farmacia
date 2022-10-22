@extends('plantilla.principalpag')
@section('pestania', 'Caja de Alivio')
@section('contenido')

<div class="content-wrapper">
    <div class="container-fluid">
        <h1 style="margin-left: 2%;">Vaciar caja de alivio</h1>

        <h1 style="margin-bottom: 2%;"></h1>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <form style="margin-left: 1%;" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="nombrepro">¿Desea vaciar caja de alivio?</label>
                            <input minlength="2" maxlength="2" style="width: 18%" class="form-control" type="text" id="cajaalivio" name="cajaalivio" required="required" placeholder="Ingrese si para vaciar la caja">
                            <button style="margin-top: 2%" type="submit">Vaciar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection