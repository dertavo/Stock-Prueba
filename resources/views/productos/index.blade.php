@extends('layout/base')

@section('contenido')


<div class="container">

<a class="btn btn-primary" href="{{route('productos.create')}}">Nuevo producto</a>

<hr>


@if(session('status'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">SKU</th>
      <th scope="col">Nombre del producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Estado</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>

    @foreach($productos as $producto)

    @php 
    $activo="";

    if($producto->estado=="Inactivo"){
        $activo="alert alert-danger";
    }


    @endphp

    <tr class="<?php echo $activo ?>"> 
      <th>{{$producto->sku}}</th>
      <td>{{$producto->nombre_producto}}</td>
      <td>{{$producto->cantidad}}</td>
      <td>{{$producto->precio}}</td>
      <td>{{$producto->estado}}</td>
      <td>
      <a id="detalles" class="btn btn-success" href="#" 
      data-sku="{{$producto->sku}}"
      data-nombreproducto="{{$producto->nombre_producto}}"
      data-cantidad="{{$producto->cantidad}}"
      data-precio="{{$producto->precio}}"
      data-estado="{{$producto->estado}}"
     
      data-toggle="modal" data-target="#myModal">Ver detalles</a>
          <a class="btn btn-secondary" href="{{route('productos.edit',$producto->id)}}">Editar</a>
          <form action="{{route('productos.destroy',['producto'=>$producto->id])}}" method="post">
         @csrf
         @method('delete')
        <input type="submit" value="Eliminar" class="btn btn-danger">
          </form>
         

      </td>
    </tr>
    @endforeach

  </tbody>
</table>

<div class="modal" tabindex="-1" id="myModal"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalles del producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">SKU</label>
        <input type="text" id="SKU" class="form-control" readonly> 
        <label for="">Nombre del producto</label>
        <input type="text" id="nombreproducto" class="form-control" readonly> 
        <label for="">Precio</label>
        <input type="text" id="precio" class="form-control" readonly> 
        <label for="">Cantidad</label>
        <input type="text" id="cantidad" class="form-control" readonly> 
        <label for="">Estado</label>
        <input type="text" id="estado" class="form-control" readonly> 

      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>

</div>


@section('scripts')


<script>

$('#myModal').on('shown.bs.modal', function (event) {
 
    var elem = document.getElementById('detalles');
    let sku = elem.getAttribute('data-sku');
    let nombreproducto = elem.getAttribute('data-nombreproducto');
    let cantidad = elem.getAttribute('data-cantidad');
    let precio = elem.getAttribute('data-precio');
    let estado = elem.getAttribute('data-estado');
    
    $('#SKU').val(sku);
    $('#nombreproducto').val(nombreproducto);
    $('#cantidad').val(cantidad);
    $('#precio').val(precio);
    $('#estado').val(estado);
    
})

</script>

@endsection

@endsection