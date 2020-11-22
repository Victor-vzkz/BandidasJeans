@extends('layouts.app')
@section('title','Bandidas Jeans | Dashboard')

@section('body-class','product-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

<div class="header header-filter" style="background-image: url('https://www.publico.es/viajes/wp-content/uploads/2018/09/dolomitas.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Panel de compras</h2>
            <h5 class="title text-center">Se aplica precio de mayoreo a partir de 10 unidades</h5>
            @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
             @endif
    <ul class="nav nav-pills nav-pills-primary" role="tablist">
    <li class="active">
        <a href="#dashboard" role="tab" data-toggle="tab">
            <i class="material-icons">dashboard</i>
            Carrito de compras
        </a>
    </li>
    </ul>
    <hr>
    <p><strong>Tu carrito de compras tiene {{auth()->user()->cart->details->count()}} productos.</strong></p>
    <table class="table">



                        <thead>
                            <tr>
                                <th class="text-center">Imagen</th>
                                <th class="text-center" >Nombre</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Mayoreo</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Talla</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">SubTotal</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->cart->details as $detail)
                            <tr>
                            <td class="text-center">
                                <img src="{{$detail->product->featured_image_url}}" height="100">
                            </td>
                            <td class="text-center">
                            <a href="{{url('/products/'.$detail->product->id)}}" target="_blank" >{{$detail->product->name}}</a>
                            </td>

                            <td class="text-center">${{$detail->product->price}}</td>
                            <td class="text-center">${{$detail->product->price_plus}}</td>
                            <td class="text-center">{{$detail->quantity}}</td>
                            <td class="text-center">{{$detail->tallas}}</td>
                              <td class="text-center">{{$detail->color}}</td>
                            <td class="text-center">@if($detail->sum("quantity")>=10)${{$detail->quantity * $detail->product->price_plus}}
                                       
                            @else
                            ${{$detail->quantity * $detail->product->price}}
                            
                            @endif
                            </td>
                            <td class="td-actions text-center">
                             <form method="post" action="{{url('/cart')}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                    <a href="{{url ('/products/'.$detail->product->id)}}" target="_blank" rel="tooltip" title="Visualizar producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info " ></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

    </table>
                        <h4 class="text-center"><strong>Importe a pagar: {{auth()->user()->cart->total}}</strong></h4> 
    <div class="text-right">
        <form method="post" action="{{url('/order')}}">
            {{csrf_field()}}
     <button class="btn btn-primary btn-round">
         <i class="material-icons">done</i> Realizar pedido
     </button>   
       </form>
    </div>
    
   </div>
    
 </div>

</div>

@include('includes.footer')
@endsection

