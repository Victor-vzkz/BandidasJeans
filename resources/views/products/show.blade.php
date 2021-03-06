@extends('layouts.app')
@section('title','Bandidas Jeans | Dashboard')
@section('body-class','profile-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


 <div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

 <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">

                        <div class="team-player">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{$product->featured_image_url}}" alt="Circle Image" class="img-circle img-responsive img-raised">
                            </div>

                            @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                            @endif
                              
           @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach      
            </ul>
            </div>
            @endif

                            <div class="name">
                                <h3 class="title">{{$product->name}}</h3>
                                <h6>{{$product->category->name}}</h6>
                                <h6>{{$product->talla}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="description text-center">
                        <p>{{$product->long_description}} </p>
                    </div>
                    <div class="text-center"> 
                        @if(auth()->check())
                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                        <i class="material-icons">add</i> Añadir al carrito de compras
                    </button>
                        @else
                    <a href="{{url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round" >
                        <i class="material-icons">add</i> Añadir al carrito de compras
                    </a>    
                    @endif
                    </div>

                    <!-- Button trigger modal -->
<!-- Modal Core -->

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="profile-tabs">
                                <div class="nav-align-center">

                                    <div class="tab-content gallery">
                                        <div class="tab-pane active" id="studio">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @foreach ($imagesLeft as $image)
                                                    <img src="{{$image->url}}" class="img-rounded" />
                                                    @endforeach
                                                </div>
                                                <div class="col-md-6">
                                                    @foreach ($imagesRight as $image)
                                                    <img src="{{$image->url}}" class="img-rounded" />
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Profile Tabs -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
      </div>

      <form method="post" action="{{url('/cart')}}">
        {{csrf_field() }}
      
        <input type="hidden" name="product_id" value="{{$product->id}}"></input>
      
      <div class="modal-body">
        <input type="number" name="quantity" value="1" class="form-control">

      <h4 class="modal-title" id="myModalLabel">Seleccione la talla del producto</h4>
        <input type="number" name="tallas" value="1" class="form-control">
      
      <h4 class="modal-title" id="myModalLabel">Seleccione el color</h4>
        <input type="text" name="color" value="Seleccione un color que se encuentre en la descripción del producto" class="form-control">
      
      </div> 


      
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-info btn-simple">Añadir al carrito </button>
      </div>
      
      </form>
      
    </div>
  </div>
</div>
@include('includes.footer')
@endsection

