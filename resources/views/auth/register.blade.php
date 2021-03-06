@extends('layouts.app')
@section('body-class','signup-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<div class="header header-filter" style="background-image: url('{{asset('/img/fonde.jpeg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('register') }}">
                         {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>Registro</h4>
        @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach      
            </ul>
            </div>
            @endif
                            <!-- <div class="social-line">
                                <a href="https://www.facebook.com/tutianguisweb" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="https://www.instagram.com/bandidas_jeans/" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="https://vm.tiktok.com/ZSHQ2vEB/"           class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div> -->
                        </div>
                        <p class="text-divider">Completa tus datos</p>
                        <div class="content">
                            <div class="input-group">
                               <span class="input-group-addon">
                                <i class="material-icons">face</i>
                               </span>                                                   
                               <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name', $name) }}" required autofocus>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" placeholder="Correo electrónico"  class="form-control" name="email" value="{{ old('email', $email) }}" required autofocus>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">phone</i>
                                </span>
                                <input id="phone" type="phone" placeholder="Teléfono"  class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">accessibility</i>
                                </span>
                                <input id="address" type="text" placeholder="Dirección"  class="form-control" name="address" value="{{ old('address') }}" required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" class="form-control"  placeholder="Contraseña" name="password" required/>
                            </div>

                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" class="form-control"  placeholder="Confirma tu contraseña" name="password_confirmation" required/>
                            </div>

                         </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar registro</a>
                        </div>
                      <!--  <a class="btn btn-link" href="{{ route('password.request') }}">
                       ¿Olvidaste tu contraseña?
                      </a>-->
                    </form>
                </div>
            </div>
        </div>
    </div>


@include('includes.footer')
</div>
@endsection
