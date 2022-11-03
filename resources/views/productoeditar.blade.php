@extends('plantilla.principalpag')
@section('pestania', 'Editar producto')
@section('contenido')

@if($errors->any())
<div class="alert alert-danger">

    @foreach($errors->all() as $error)
    <p>
        {{$error}}
    </p>
    @endforeach

</div>
@endif


<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-left: 3% ;  margin-bottom: 3%; "> Editar producto </h1>

        <h1 style="margin-bottom: 2%;"></h1>
        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form style="margin-left: 2%;" method="POST" action="{{route('update.producto',['id'=>$producto->id])}}">
                        @method('put')
                        @csrf


                        <div>
                            <label for="id_proveedor">Nombre del Proveedor:</label>
                            <select name="nombre_proveedor" id="nombrepro" required="required" class="form-control selectpicker" data-live-search="true">
                                @foreach ($proveedors as $pro)
                                <option {{ ($pro->id) == $producto->id_prov  ? 'selected' : '' }} value="{{$pro->id}}">{{$pro->Nombre_del_proveedor}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label for="nombre_producto">Nombre del Producto:</label>
                            <input class="form-control " type="text" class="form-control-file" name="nombre_producto" id="nombre_producto" placeholder="nombre_producto" value="{{$producto->nombre_producto}}" maxlength="50">
                        </div>

                        <div>
                            <label for="principio_activo">Principio Activo:</label>
                            <input class="form-control " type="text" class="form-control-file" name="principio_activo" id="principio_activo" placeholder="principio_activo" value="{{$producto->principio_activo}}">
                        </div>

                        <div>
                            <label for="Descripcion">Descripcion:</label>
                            <input class="form-control " type="text" class="form-control-file" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$producto->descripcion}}" maxlength="110">
                        </div>

                        <hr>
                        <div style="text-align: center">
                        <button style=" margin-left: 10px;" type="submit" class="btn btn-primary">Guardar</button>
                            <input type="reset" class="btn btn-danger">
                            <a class="btn btn-success" href="/Producto">Regresar</a>
                        </div>
                        <h1 style="margin-bottom: 2%;"></h1>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection