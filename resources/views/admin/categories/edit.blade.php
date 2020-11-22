@extends('layouts.app')
@section('title','Bienvenido a Bandidas Jeans')

@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">


<div class="header header-filter" style="background-image: url('https://www.publico.es/viajes/wp-content/uploads/2018/09/dolomitas.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar categoria seleccionada</h2>
           
           @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach      
            </ul>
            </div>
            @endif
           
           <form method="post" action="{{url('/admin/categories/'.$category->id.'/edit')}}" enctype="multipart/form-data">
               {{csrf_field()}}

            <div class="row">
                <div class="col-sm-6">
                 <div class="form-group label-floating">
                   <label class="control-label">Nombre de la categoría</label>
                   <input type="text" class="form-control" name="name" value="{{ old('name', $category->name)}}">
                 </div>
                </div>
               <div class="col-sm-6">
                 <label class="control-label">Imagen de la categoría</label>
                 <input type="file" name="image">
                 @if($category->image)
                 <p class="help-block">
                   Subir sólo si desea reemplazar la
                   <a href="{{asset('/images/categories/'.$category->image)}}" target="_blank">imagen actual</a>
                 </p>
                 @endif
              </div>
            </div>
            
            <textarea class="form-control" placeholder="Descripción de la categoría" name="description">{{ old('description', $category->description)}}</textarea>
            
            <button class="btn btn-primary">Guardar cambios</button>
            <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
     
           </form>
        </div>

    </div>
 
</div>

@include('includes.footer')
@endsection
    