@extends('layouts.app')
@section('title','Listado de productos')
@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<div class="header header-filter" style="background-image: url('https://www.hogarmania.com/archivos/202010/como-lavar-pantalones-vaqueros-668x400x80xX-1.jpg');">
</div>

<div class="main main-raised">
    <div class="container">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
        <style type="text/css">    
     .container{
    width: 100%;
    max-width: 1200px;
    margin: auto;
 }
 .table{
    width: 100%;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    table-layout: fixed;
 }
 .table caption{
    font-size: 28px;
    text-transform: uppercase;
    font-weight: bold;
    margin: 8px,0px;
 }

 .table tr{
    border: 1px;
 }
 .table th, .table td{
    padding: 4px;
    text-align: center;
 } 
 @media screen and (max-width: 700px){
        .table{
            border:0px;
        }
        .table caption{
            font-size: 22px;
        }
        .table thead{
            display: none;
        }
        .table tr{
            margin-bottom: 4px;
            border-bottom: 4px;
            display: block;
        }
        .table td{
            display: block;
            border-bottom: 1px;
            text-align: right;
        }
        .table td:last-child{
            border-bottom: 0;
        }
        .table td::before{
            content: attr(data-label);
            font-weight: bold;
            text-transform: uppercase;
            float: left;
        }
    }
    </style>
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
                                <th class="col-md-2 text-center">Descripción Larga</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center">Precio</th>
                                <th class="text-right">Precio Mayoreo</th>
                                <th class="col-md-2 text-right">Tallas</th>
                                <th class="col-md-2 text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                            <td class="text-center" data-label="id">{{$product->id}}</td>
                            <td class="text-center" data-label="nombre">{{$product->name}}</td>
                            <td class="text-center" data-label="Descripción">{{$product->description}}</td>
                            <td class="text-center" data-label="Descripción Extensa">{{$product->long_description}}</td>
                            <td class="text-center" data-label="categoría">{{$product->category ? $product->category->name : 'General'}}</td>
                            <td class="text-right" data-label="Precio">&dollar;{{$product->price}}</td>
                            <td class="text-right" data-label="precio Mayoreo">&dollar;{{$product->price_plus}}</td>
                            <td class="text-right" data-label="talla">{{$product->talla}}</td>
                            <td class="td-actions text-right" data-label="opciones">
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
    