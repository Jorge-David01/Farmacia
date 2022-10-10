@extends('plantilla.principalpag')
@section('pestania', 'Cambio Contrasena')

@section('contenido')

 <div class="x_content">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $mensaje)
                    <li>
                        {{$mensaje}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        input{
            border-radius: 0px !important;
        }
    </style>

     <h1 style="margin-left: 4% ;  margin-bottom: 3%; "> Cambio Contrasena </h1>

    <form style="margin-left: 3%;" method="post" enctype="multipart/form-data" 
    action="{{route('contrasenia.cambiopost')}}" method="POST" 
    >
        @csrf

        <input hidden  name="id" value="{{$user->id}}" />
        <input hidden  name="from" value="{{$from}}" />


        <div class="item form-group">
            <label for="password" class="col-sm-3 col-form-label">{{ __('Contraseña:') }}</label>
            <div class="col-md-6 col-sm-6 ">
                <div class="input-group" style="width: 100%;" >
                <input id="password" type="password"  {{old('contraseña')}} class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{old('password')}}" placeholder="Ingrese la contraseña" >
                        <span class="input-group-btn">
                            <button id="show_password" class="btn" style="background: #3385ff" type="button" onclick="mostrarPassword()">
                                <span class="fa fa-eye-slash icon"></span>
                            </button>
                        </span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="item form-group">
            <label for="confirm_password" class="col-sm-3 col-form-label">{{ __('Confirmar Contraseña:') }}</label>
            <div class="col-md-6 col-sm-6">
                <div class="input-group" style="width: 100%;" >
                <input id="confirm_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Confirme la contraseña">
                <span class="input-group-btn">
                    <button id="show_confirm_password" class="btn" style="background: #3385ff" type="button" onclick="mostrarConfirmPassword()">
                        <span class="fa fa-eye-slash icon"></span>
                    </button>
                </span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
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

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <br><br>
                    <div style="margin-left: 0%;" class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-danger" type="button" onclick="window.location='/Empleados'">Cancelar</button>
                        <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

    </form>
</div>
            




@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection