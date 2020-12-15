@extends('layouts.app')
@section('title','Listado de pedidos')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('https://www.hogarmania.com/archivos/202010/como-lavar-pantalones-vaqueros-668x400x80xX-1.jpg');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Pedidos</h2>
           <div class="section text-right">
            <div class="team">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="col-md-2 text-center">Email</th>
                                <th class="col-md-3 text-center">Fecha del pedido</th>
                                <th class="col-md-2 text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                @foreach(user()->cart->details as $detail)
                            <td class="text-center">{{$detail->user->id}}</td>
                            <td class="text-center">{{$detail->user->name}}</td>
                            <td class="text-center">{{$detail->user->email}}</td>
                            <td class="text-center">{{$cart->total}}</td>
                           
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                      <div class="section text-center">
                  {{$cartdetails->links()}}
                </div>
            </div>

        </div>
    </div>

</div>


@include('includes.footer')
@endsection
    