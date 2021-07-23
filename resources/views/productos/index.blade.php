@extends('layout/base')

@section('contenido')


<div class="container">

<a class="btn btn-primary" href="{{route('productos.create')}}">Nuevo producto</a>

<hr>


@if(session('status'))

<div>{{session('status')}} </div>

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
          <a class="btn btn-secondary" href="{{route('productos.edit',$producto->id)}}">Editar</a>
          <a class="btn btn-danger" href="{{route('productos.destroy',['producto'=>$producto->id]) }}">Eliminar</a>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>



</div>


@endsection