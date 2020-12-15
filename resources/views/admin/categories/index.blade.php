@extends('layouts.app')
@section('title','Listado de categorias')
@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<div class="header header-filter" style="background-image: url('https://www.hogarmania.com/archivos/202010/como-lavar-pantalones-vaqueros-668x400x80xX-1.jpg');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Categorias</h2>
           <div class="section text-right">
                    <a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round">Registrar una nueva categoria</a>
            <div class="team">
                <div class="row">
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

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                            <td class="text-center" data-label="id">{{($key+1 )}}</td>
                            <td class="text-center" data-label="nombre">{{$category->name}}</td>
                            <td class="text-center" data-label="descripción">{{$category->description}}</td>
                            <td class="text-center" data-label="imagen">
                                <img src="{{$category->featured_image_url}}" height="70" width="80">
                            </td>
                            <td class="td-actions text-center" data-label="opciones">
                             <form method="post" action="{{url('/admin/categories/'.$category->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    <a href="{{ url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar categoria " class="btn btn-success btn-simple
                                        btn-xs ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/admin/categories/'.$category->id.'/eliminar')}}" rel="tooltip" title="Eliminar categoria" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                      <div class="section text-center">
                  {{$categories->links()}}
                </div>
            </div>

        </div>
    </div>

</div>


@include('includes.footer')
@endsection
    