@extends('layouts.app')
@section('title','Imágenes de productos')
@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<div class="header header-filter" style="background-image: url('https://www.hogarmania.com/archivos/202010/como-lavar-pantalones-vaqueros-668x400x80xX-1.jpg');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imágenes del producto "{{$product->name}}"</h2>
           <div class="section text-center">

          
            <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
            <input type="file" name="photo" required>
            <button type="submit" class="btn btn-primary btn-round">SUBIR NUEVA IMAGEN</button>
            <a href="{{url('/admin/products/')}}" class="btn btn-default btn-round"> VOLVER AL LISTADO DE PRODUCTOS</a>
            </form>
            
          <hr>

           <div class="row">
            @foreach ($images as $image)
            <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                <img src="{{$image->url}}" width="250" height="200">
                <form method="post" action="">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="hidden" name="image_id" value="{{$image->id}}">
                <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                @if ($image->featured)
                 <button type = "button" class="btn btn-info fa fa-heart btn-round col-md-3" rel="tooltip" title="Imagen destacada">
                    <i class="material-icons">favorito</i>
                 </button>
                @else
                   <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}"
                    class="btn btn-primary fa fa-heart btn-round col-md-3">
                    <i class="material-icons">favorito</i>
                   </a>
                @endif
                </form>
            </div>
            </div>
            </div>
            @endforeach
</div>
</div>

@include('includes.footer')
@endsection
    