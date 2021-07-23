
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php 

if($operacion=="nuevo"){
    $id=0;
    $method="post";
    $accion='productos.store';
}else{
    $accion='productos.update';
    $id=$producto->id;
    $method="PUT";
}


@endphp

<form action="{{ route($accion, ['producto' => $id]) }}"  method="post">

@csrf
@method($method)

<label for="sku">SKU</label>
<input type="text" name="sku" id="sku" class="form-control" value="{{old('sku',$producto->sku)}}">

<label for="nombre_producto">Nombre del producto</label>
<input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="{{old('nombre_producto',$producto->nombre_producto)}}">

<label for="cantidad">Cantidad</label>
<input type="text" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad',$producto->cantidad)}}">


<label for="precio">Precio</label>
<input type="text" name="precio" id="precio" class="form-control" value="{{old('precio',$producto->precio)}}">

<label for="estado">Estado</label>
<select name="estado" id="estado" class="form-control">
<option value="">Selecciona uno</option>
<option value="Activo">Activo</option>
<option value="Inactivo">Inactivo</option>
</select>
<hr>



@if($operacion=="nuevo")
<input type="submit" value="Registar producto" class="btn btn-primary">

@else
<input type="submit" value="Actualizar producto" class="btn btn-primary">

@endif





</form>