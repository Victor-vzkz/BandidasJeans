@extends('layouts.app')
@section('title','Bienvenido a Bandidas Jeans')

@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<div class="header header-filter" style="background-image: url('https://www.hogarmania.com/archivos/202010/como-lavar-pantalones-vaqueros-668x400x80xX-1.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar producto</h2>
           
           @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach      
            </ul>
            </div>
            @endif
           
           <form method="post" action="{{url('/admin/products/'.$product->id.'/edit')}}">
               {{csrf_field()}}
            <div class="row">
             <div class="col-sm-6">
               <div class="form-group label-floating">
                 <label class="control-label">Nombre del producto</label>
                 <input type="text" class="form-control" name="name" 
                 value="{{ old('name', $product->name)}}">
               </div>
             </div>
             <div class="col-sm-6">
              <div class="form-group label-floating">
                 <label class="control-label">Precio del producto</label>
                 <input type="number" step="0.01" class="form-control" name="price" 
                 value="{{old('price',$product->price)}}">
             </div>
           </div>
             </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                       <label class="control-label">Precio del producto(Mayoreo)</label>
                       <input type="number" step="0.01" class="form-control" name="price_plus" value="{{old('price_plus', $product->price_plus)}}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group label-floating">
                       <label class="control-label">Categoría del producto</label>
                          <select class="form-control" name="category_id">
                             <option value="">General</option>
                                     @foreach ($categories as $category)
                             <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif >{{$category->name}}
                             </option>
                                     @endforeach
                          </select>  
                    </div>
                 </div>   
              </div>
             

             <div class="row">
                <div class="col-sm-6">
                   <div class="form-group label-floating">
                        <label class="control-label">Descripción corta</label>
                        <input type="text" class="form-control" name="description"
                        value="{{old('description', $product->description)}}">
                   </div>
                </div>
                <div class="col-sm-6">
                   <div class="form-group label-floating">
                        <label class="control-label">Tallas disponibles</label>
                        <input type="text" class="form-control" name="talla"
                        value="{{old('talla', $product->talla)}}">
                   </div>
                </div>
              </div>
             



             <textarea class="form-control" placeholder="Descripción extensa del producto" name="long_description">{{ old('long_description', $product->long_description)}}</textarea>
             <button class="btn btn-primary">Guardar cambios</button>
             <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>
     
           </form>
        </div>

    </div>
 
</div>

@include('includes.footer')
@endsection
    