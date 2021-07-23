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

    <tr>
      <th>{{$producto->sku}}</th>
      <td>{{$producto->nombre_producto}}</td>
      <td>{{$producto->cantidad}}</td>
      <td>{{$producto->precio}}</td>
      <td>{{$producto->estado}}</td>
      <td>
      <a class="btn btn-success" href="#">Ver detalles</a>
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



</div>


@endsection