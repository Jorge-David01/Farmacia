@extends('plantilla.principalpag')
@section('pestania', 'Formulario de empleados')

@section('contenido')

<div class="x_content">
   
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

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombres: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="50" type="text" id="nombres" name="nombres" required="required" class="form-control "
                value="{{old('nombres')}}"
                placeholder="Ingrese los nombres">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Apellidos: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="50" type="text" id="apellidos" name="apellidos" required="required" class="form-control"
                value="{{old('apellidos')}}"
                placeholder="Ingrese los apellidos">
            </div>
        </div>
        <?php $fecha_actual = date("d-m-Y");?>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input id="birthday" name="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 65 year"));?>"
                value="{{old('birthday')}}"
                type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='date'" onmouseout="timeFunctionLong(this)">
                <script>
                    function timeFunctionLong(input) {
                        setTimeout(function() {
                            input.type = 'date';
                        }, 60000);
                    }
                </script>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Identidad: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="13" type="text" id="dni" name="dni" required="required" class="form-control"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('dni')}}"
                pattern="[0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9}"
                title="Ingrese un numero de identidad valido"
                placeholder="Ingrese la identidad sin guiones">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Teléfono Personal: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="8" type="tel" id="personal" name="personal" required="required" class="form-control"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('personal')}}"
                pattern="[9,8,3,2]{1}[0-9]{7}"
                title="Ingrese un numero telefónico valido que inicie con 2,3,8 o 9 y que contenga 8 digitos"
                placeholder="Ingrese el teléfono personal">

            </div>
        </div>
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Correo Electrónico: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="60" type="email" id="email" name="email" required="required" class="form-control"
                value="{{old('email')}}"
                placeholder="Ingrese el correo electrónico"
                pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$"
                title="Ingrese un punto seguido de un dominio como por ejemplo .com .es .org">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dirección: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <textarea maxlength="200" placeholder="Ingrese la dirección" name="direccion" id="direccion" name="direccion" cols="1" rows="3" required="required" class="form-control">{{old('direccion')}}</textarea>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Genero: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="radio" name="genero" id="genero" value="Femenino">Femenino
                <input type="radio" name="genero" id="genero" value="Masculino">Masculino
            </div>
        </div>

        <label for="confirm_password" class="col-sm-4 col-form-label">{{ __('Contraseña:') }}</label>
                <div class="input-group" style="width: 40%; margin-right: 1110px" >

                    <input placeholder="Ingrese la contraseña" id="password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="password" required>
                    <span class="input-group-btn">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </span>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <label for="confirm_password" class="col-sm-4 col-form-label">{{ __('Confirmar Contraseña:') }}</label>
                <div class="input-group" style="width: 40%; margin-right: 1110px" >
                    <input placeholder="Confirme la contraseña" id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="new-password">
                    <span class="input-group-btn">
                        <button id="show_confirm_password" class="btn btn-primary" type="button" onclick="mostrarConfirmPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </span>
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <script type="text/javascript">
                    function mostrarCurrentPassword(){
                        var x = document.getElementById("current_password");
                        if(x.type == "password"){
                            x.type = "text";
                            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                        }else{
                            x.type = "password";
                            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                        }
                    }
                    function mostrarPassword(){
                        var y = document.getElementById("password");
                        if(y.type == "password"){
                            y.type = "text";
                            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                        }else{
                            y.type = "password";
                            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                        }
                    }
                    function mostrarConfirmPassword(){
                        var z = document.getElementById("confirm_password");
                        if(z.type == "password"){
                            z.type = "text";
                            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                        }else{
                            z.type = "password";
                            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                        }
                    }
                </script>

        
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-regresar" type="button" onclick="window.location=''">Cancelar</button>
                <a type="button" href="javascript:location.reload()" class="btn btn-limpiar">Limpiar</a>
                <button type="submit" class="btn btn-guardar">Guardar</button>
            </div>
        </div>

    </form>
</div>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection