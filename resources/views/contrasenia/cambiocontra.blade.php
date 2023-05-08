@extends('plantilla.principalpag')
@section('pestania', 'Cambio Contrasena')

@section('contenido')
@section('TituloPlantillas', 'Cambio de contraseña')

<div class="x_content">



    <style>
        input {
            border-radius: 0px !important;
        }
    </style>



    <div class="content-wrapper">
        <div class="container-fluid">


          

            <div style="margin: auto; margin-top: 2%;" class="col-6 col-lg-6">
                <div style="margin-top: 15%;" class="card">
                    <div class="card-body">
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

                        <form style="margin-left: 3%;" method="post" enctype="multipart/form-data" action="{{route('contrasenia.cambiopost')}}" method="POST">
                            @csrf

                            <input hidden name="id" value="{{$user->id}}" />
                            <input hidden name="from" value="{{$from}}" />

                            @if( $from == 'navbar')
                            <div class="item form-group">
                                <label for="password">{{ __('Verificar Contraseña:') }}</label>
                                <div>
                                    <div class="input-group" style="width: 100%;">
                                        <input id="verificar_contrasenia" type="password" class="form-control  @error('verificar_contrasenia') is-invalid @enderror" name="verificar_contrasenia" required autocomplete="current-password" value="{{$verificar_contrasenia}}" placeholder="Verifique su contraseña">
                                        <span class="input-group-btn">
                                            <button id="show_password" class="btn" style="background: #3385ff" type="button" onclick="mostrarCurrentPassword()">
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
                                @endif

                                <div class="item form-group">
                                    <label for="password">{{ __('Contraseña:') }}</label>
                                    <div>
                                        <div class="input-group" style="width: 100%;">
                                            <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{$password}}" placeholder="Ingrese la contraseña">
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
                                        <label for="confirm_password">{{ __('Confirmar Contraseña:') }}</label>
                                        <div>
                                            <div class="input-group" style="width: 100%;">
                                                <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" value="{{$password_confirmation}}" name="password_confirmation" required autocomplete="current-password" placeholder="Confirme la contraseña">
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
                                        function mostrarCurrentPassword() {
                                            var x = document.getElementById("verificar_contrasenia");
                                            if (x.type == "password") {
                                                x.type = "text";
                                                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                                            } else {
                                                x.type = "password";
                                                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                                            }
                                        }

                                        function mostrarPassword() {
                                            var y = document.getElementById("password");
                                            if (y.type == "password") {
                                                y.type = "text";
                                                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                                            } else {
                                                y.type = "password";
                                                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                                            }
                                        }

                                        function mostrarConfirmPassword() {
                                            var z = document.getElementById("confirm_password");
                                            if (z.type == "password") {
                                                z.type = "text";
                                                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                                            } else {
                                                z.type = "password";
                                                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                                            }
                                        }
                                    </script>

                                    <div class="ln_solid"></div>
                                

                                    <hr>
                                    <div style="text-align: center">
                                        <button class="btn btn-danger" type="button" onclick="window.location='/ListaUsuarios'">Cancelar</button>
                                        <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>




@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection