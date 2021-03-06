@extends('layouts.app')

@section('body-class','signup-page')
@section('content')
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<div class="header header-filter" style="background-image: url('{{asset('/img/fonde.jpeg')}}'); background-image: opacity; background-size: cover; background-position: top center;" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form method="POST" action="{{ route('login') }}">
                         {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>Inicio de sesión</h4>
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
                        <p class="text-divider">Ingresa tus datos</p>
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" placeholder="Email..."  class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" class="form-control"  placeholder="Contraseña..." name="password" required/>
                            </div>

                            <!--If you want to add a checkbox to this form, uncomment this code-->

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión
                                </label>
                            </div> 
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Ingresar</a>
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
    