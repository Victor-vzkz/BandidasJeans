@extends('layouts.app')
@section('title','Bienvenido a Bandidas Jeans')

@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<div class="header header-filter" style="background-image: url('https://www.publico.es/viajes/wp-content/uploads/2018/09/dolomitas.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registrar nueva categoria</h2>
           
           @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach      
            </ul>
            </div>
            @endif
           
           <form method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
               {{csrf_field()}}
            
            <div class="row">
              <div class="col-sm-6">
                 <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                 </div>
              </div>

              <div class="col-sm-6">
                 <label class="control-label">Imagen de la categoría</label>
                 <input type="file"  name="image">
              </div>
            </div>

             <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{old('description')}}</textarea>

             <button class="btn btn-primary">Registrar categoria</button>
             <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
           </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection
    