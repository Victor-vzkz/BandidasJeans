@extends('layouts.app')
@section('title','Bandidas Jeans | Dashboard')
@section('body-class','product-page')
@section('content')

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<div class="header header-filter" style="background-image: url('https://www.hogarmania.com/archivos/202010/como-lavar-pantalones-vaqueros-668x400x80xX-1.jpg');">
</div>

<div class="main main-raised">

<div class="container">
        <div class="section">
            <h2 class="title text-center">Hacer pago de pedido</h2>
            @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
             @endif
         </div>
    <div class="text-center">
        <form action="{{route('pay')}}" method="post"  id="paymentForm">
            {{csrf_field()}}
        <div class="row">
             <div class="col-sm-6">

                 <strong>Importe a pagar:</strong>
                 <input type="number" name="value" value="{{auth()->user()->cart->total}}">
             </div>
             <div class="col-sm-6">
                 <label>Currency</label>
                 <select class="custom-select" name="currency" required>
                     @foreach ($currencies as $currency)
                        <option value="{{ $currency->iso}}">
                            {{ strtoupper($currency->iso)}}
                        </option>
                     @endforeach
                 </select>
             </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <div class="form-group" id="toggler">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach ($paymentPlatforms as $paymentPlatform)
                    <label class="btn btn-outline-secondary m-2 p-1" data-target="#{{$paymentPlatform->name}}Collapse" data-toggle="collapse">
                        <input type="radio" name="payment_platform" value="{{$paymentPlatform->id}}" required>
                    <img class="img-thumbnail img-responsive" height="150" width="200" src="{{ asset ($paymentPlatform->image)}}">
                    </label>
                    @endforeach
                </div>
                @foreach ($paymentPlatforms as $paymentPlatform)
                <div id="{{$paymentPlatform->name}}Collapse" class="collapse" data-parent="#toggler">
                    @includeIf('components.' . strtolower($paymentPlatform->name). '-collapse')
                </div>
                @endforeach
            </div>
        </div>
        </div>
        
        <div class="text-center mt-3">
             <button type="submit" id="payButton" class="button btn-primary btn-lg">Pagar</button>
        </div>   

         </form>
  
    </div>
    
   </div>
   </div>
 

@include('includes.footer')
@endsection

