@extends('layouts.app')
@section('title','Bienvenido a Bandidas Jeans')

@section('body-class','landing-page')
@section ('styles')
<style>
    .team .row .col-md-4{
        margin-bottom: 5em;
    }
    .team .row{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }
    .team .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    .tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 220px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
    
</style>
@endsection 
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


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
          
          <div class="text-center">
            <h2 class="title">Busca tus productos aquí</h2>
          
          <form class="form-inline" method="get" action="{{url('/search')}}">
              <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
              <button class="btn btn-primary btn-just-icon" type="submit">
                  <i class="material-icons">search</i>
              </button>
          </form>

          <div class="section text-center">
            <h2 class="title">Visita nuestras categorías</h2>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">

                            <img src="{{ $category->featured_image_url}}" alt="Imagen representativa de la categoría {{$category->name}}" class=" img-circle" >
                            <h4 class="title">
                            <a href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
                            
                            </h4>
                            <p class="description">{{$category->description}}</p>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

          <div class="text-center">
               <h2 class="title">Conoce nuestras formas de pago</h2>
            <div>
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
    </div>


        <div class="section landing-section">
          
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Aún no te registras?</h2>
                    <h4 class="text-center description">Registrate ingresando tus datos básicos y podrás realizar tus pedidos a través de nuestro carrito de compras además de conocer todos los beneficios de nuestra tienda. Si aún tienes dudas puedes realizar algunas consultas sobre los productos sin registrarte.  </h4>
                    <form class="contact-form" method="get" action="{{url('/register')}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Escribe tu nombre</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    INICIAR REGISTRO
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

@section('scripts')
<script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
<script>
    $(function(){
        //
        var products = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: '{{url("/products/json") }}'
        });

        $('#search').typeahead({
            hint: true,
            highlight: true,
            minLength: 1            
        }, {
            name: 'products',
            source: products
        });
    });
</script>
@endsection    