@extends('layouts.app')
@section('title','Listado de categorias')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('https://www.publico.es/viajes/wp-content/uploads/2018/09/dolomitas.jpg');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Categorias</h2>
           <div class="section text-right">
                    <a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round">Registrar una nueva categoria</a>
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                            <td class="text-center">{{($key+1 )}}</td>
                            <td class="text-center">{{$category->name}}</td>
                            <td class="text-center">{{$category->description}}</td>
                            <td class="td-actions text-center">
                             <form method="post" action="{{url('/admin/categories/'.$category->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    <a href=""  rel="tooltip" title="Visualizar categoria " class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info " ></i>
                                    </a>
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
    