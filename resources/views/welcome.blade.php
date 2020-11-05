@extends('layouts.app')
@section('title','Bienvenido a Bandidas Jeans')

@section('body-class','landing-page')
@section ('styles')
<style>
    .team .row .col-md-4{
        margin-bottom: 5em;
    }
    .row{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }
    .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    
</style>
@endsection 
@section('content')
<div class="header header-filter" style="background-image: url('https://www.publico.es/viajes/wp-content/uploads/2018/09/dolomitas.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a Bandidas Jeans.</h1>
                <h4>Realiza tus pedidos en línea y te contactaremos para coordinar la entrega.</h4>
            
               
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                     <img src="{{'img/conekta.jpg'}}" alt="Logo Conekta">
                    <h2 class="title"></h2>
                    <h3 class="description">Es una plataforma que permite a negocios procesar pagos en línea en su sitio web o aplicación móvil de una manera sencilla y segura. Conekta simplifica todas las complicaciones para poder cobrar en línea, por lo que permite recibir pagos con efectivo, tarjeta, transferencia bancaria entre otras.<h3>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                 <img src="{{'img/oxxo.png'}}" alt="Logo oxxo" class="img-raised ">
                            </div>
                            <h4 class="info-title">OXXO Pay</h4>
                            <p>Es la nueva solución para comercio electrónico que permite a negocios recibir pagos en efectivo en tiendas, con notificaciones en tiempo real a través de las 14,695 sucursales de la cadena.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <img src="{{'img/tarjetas.jpg'}}" alt="tarjetas de credito o debito" class="img-raised img-circle">
                            </div>
                            <h4 class="info-title">Tarjetas Crédito/Débito </h4>
                            <p>Acepta de forma segura todas las tarjetas

Agrega el método más popular para compras en línea. Personaliza la forma de cobrar a tus clientes y protege tus transacciones con nuestro sistema antifraude.

</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <img src="{{'img/transferencia.png'}}" alt="Tranferencia bancaria" class="img-raised img-circle">
                            </div>
                            <h4 class="info-title">Tranferencia</h4>
                            <p>Recibe transferencias bancarias e identifica automáticamente tus ventas
Cada transferencia tendrá una CLABE interbancaria. Esto te permitirá identificar cada transacción de manera clara y sencilla.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>

            <div class="team">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="team-player">

                            <img src="{{ $product->featured_image_url}}" alt="Thumbnail Image" class=" img-circle" height="200">
                            <h4 class="title">
                            <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>
                            <br>
                                <small class="text-muted">{{$product->category ? $product->category->name:'General'}}</small>
                            </h4>
                            <p class="description">{{$product->description}}</p>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
              <div class="text-center" >{{$products->links()}}</div>
            </div>
            
        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Tienes alguna duda?</h2>
                    <h4 class="text-center description">Escribe las dudas que tengas en el siguiente formulario. Comunícanos tus inquietudes en un breve texto sobre el tema que necesites información (Pagos, Seguridad, Aclaraciones). Responderemos lo más pronto posible </h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Escribe tu nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Mensaje</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection
    