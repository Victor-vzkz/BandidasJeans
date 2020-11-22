@extends('layouts.app')
@section('title','Listado de productos')
@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

<div class="header header-filter" style="background-image: url('https://www.publico.es/viajes/wp-content/uploads/2018/09/dolomitas.jpg');">
</div>

<div class="main main-raised">
    <div class="container">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>
           <div class="section text-right">
                    <a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">Registrar un nuevo producto</a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="col-md-2 text-center">Descripción</th>
                                <th class="col-md-3 text-center">Descripción Larga</th>
                                <th class="col-md-1 text-center">Categoría</th>
                                <th class="col-md-1 text-center">Precio</th>
                                <th class="col-md-1 text-right">Precio Mayoreo</th>
                                <th class="col-md-1 text-right">Tallas</th>
                                <th class="col-md-3 text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                            <td class="text-center">{{$product->id}}</td>
                            <td class="text-center">{{$product->name}}</td>
                            <td class="text-center">{{$product->description}}</td>
                            <td class="text-center">{{$product->long_description}}</td>
                            <td class="text-center">{{$product->category ? $product->category->name : 'General'}}</td>
                            <td class="text-right">&dollar;{{$product->price}}</td>
                            <td class="text-right">&dollar;{{$product->price_plus}}</td>
                            <td class="text-right">{{$product->talla}}</td>
                            <td class="td-actions text-right">
                             <form method="post" action="{{url('/admin/products/'.$product->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    <a href="{{ url('/products/'.$product->id)}}"  rel="tooltip" title="Visualizar producto" class="btn btn-info btn-simple btn-xs " target="_blank">
                                        <i class="fa fa-info " ></i>
                                    </a>
                                    <a href="{{ url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple
                                        btn-xs ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imágenes del producto" class="btn btn-warning btn-success btn-simple
                                        btn-xs ">
                                        <i class="fa fa-image"></i>  </a>
                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                      <div class="section text-center">
                  {{$products->links()}}
                </div>
            </div>

        </div>
    </div>

</div>


@include('includes.footer')
@endsection
    