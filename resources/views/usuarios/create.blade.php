@extends('plantilla.principalpag')
@section('pestania', 'Formulario de usuarios')

@section('contenido')
@section('TituloPlantillas', 'Creación de usuario')

<style>
    input {
        border-radius: 0px !important;
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid">

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




        <div style="margin: auto; margin-bottom: 3%;" class="col-lg-6">
            <div style="margin-top: 15%;" class="card">
                <div class="card-body">

                    <form  method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="item form-group">
                            <label for="first-name">Nombre Completo: <span class="required"></span>
                            </label>
                            <div >
                                <input maxlength="110" type="text" id="nombre_completo" name="nombre_completo" required="required" class="form-control " value="{{old('nombre_completo')}}" placeholder="Ingrese el nombre completo">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="first-name">Rol: <span class="required"></span>
                            </label>
                            <div >
                                <select required="required" class="form-control" name="role" value="{{old('role')}}">
                                    <option value="Vendedor">Vendedor</option>
                                    <option value="Administrador">Administrador</option>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="first-name">Correo Electronico: <span class="required"></span>
                            </label>
                            <div >
                                <input placeholder="Ingrese el correo electronico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label for="password">{{ __('Contraseña:') }}</label>
                            <div >
                                <div class="input-group" style="width: 100%;">
                                    <input id="password" type="password" {{old('contraseña')}} class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{old('password')}}" placeholder="Ingrese la contraseña">
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
                        </div>

                        <div class="item form-group">
                            <label for="confirm_password">{{ __('Confirmar Contraseña:') }}</label>
                            <div >
                                <div class="input-group" style="width: 100%;">
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
                            function mostrarCurrentPassword() {
                                var x = document.getElementById("current_password");
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
                            <div style="text-align: center; ">
                            <button class=" btn btn-warning" type="button" onclick="window.location='/ListaUsuarios'">Volver</button>
                                <a type="button" href="javascript:location.reload()" class="btn btn-danger">Restablecer</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection