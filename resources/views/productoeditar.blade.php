@extends('plantilla.principalpag')
@section('pestania', 'Editar producto')
@section('contenido')

<br>
    @if($errors->any())
        <div class="alert alert-danger">
            
                @foreach($errors->all() as $error)
                    <p>
                        {{$error}}
                   </p>
                @endforeach
           
        </div>
    @endif

    
    <h1 style="margin-left: 2% ;margin-bottom: 3%; "> Editar Producto </h1>

    <form style="margin-left: 2%;" method="POST" action="{{route('update.producto',['id'=>$producto->id])}}">
        @method('put')
        @csrf

    
        <div class="col-md-6 col-sm-6 ">
        <label for="id_proveedor">Nombre del Proveedor:</label>
            <select name="nombre_proveedor" id="nombrepro" required="required" class="form-control selectpicker"
                    data-live-search="true">
                    @foreach ($proveedors as $pro)
                    <option  {{ ($pro->id) == $producto->id_prov  ? 'selected' : '' }} value="{{$pro->id}}">{{$pro->Nombre_del_proveedor}}</option>
                    @endforeach
                </select>
        </div>


        <div class="col-md-6 col-sm-6 ">
        <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" class="form-control-file" name="nombre_producto" id="nombre_producto" 
            placeholder="nombre_producto" value="{{$producto->nombre_producto}}" maxlength="50">
        </div>
        
        <div class="col-md-6 col-sm-6 ">
        <label for="principio_activo">Principio Activo:</label>
            <input type="text" class="form-control-file" name="principio_activo" id="principio_activo" 
            placeholder="principio_activo" value="{{$producto->principio_activo}}" >
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="Descripcion">Descripcion:</label>
            <input type="text" class="form-control-file" name="descripcion" id="descripcion" 
            placeholder="Descripcion" value="{{$producto->descripcion}}" maxlength="110" >
        </div>


        <div style="margin-top: 20px;">

        <button style=" margin-left: 10px;" type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">
        <a class="btn btn-success" href="/Producto">Regresar</a>


</div>
      
    </form>
@endsection