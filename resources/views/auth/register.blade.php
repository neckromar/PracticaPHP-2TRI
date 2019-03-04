@extends('layouts.app')
@section('title','Registrarse')

@section('content')
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('images/usuarios/registrarse.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card tarjeta-registro">
                        <form class="form" method="POST" action="{{route('register')}}">
                            @csrf

                            <div class="header header-primary text-center">
                                <h4>Crear cuenta</h4>
                            </div>
                            <p class="text-divider">¡Genial, un placer tenerte con nosotros!</p>
                            <div class="content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Inserte su nombre...">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>

                                    <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus placeholder="Inserte su 1º apellido...">

                                    @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>

                                    <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value="{{ old('surname2') }}" autofocus placeholder="Inserte su 2º apellido...">

                                    @if ($errors->has('surname2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname2') }}</strong>
                                    </span>
                                    @endif

                                </div>


                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">mobile_friendly</i>
                                    </span>

                                    <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus placeholder="Inserte su telefono...">

                                    @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Inserte email...">

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">vpn_key</i>
                                    </span>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Inserte contraseña...">

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repetir contraseña...">

                                </div>

                                <div class="input-group">

                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                    @if($errors -> has('g-recaptcha-response'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div class="footer text-center" style="min-height: 100px;">
                                <button type="submit" class="btn btn-simple btn-primary btn-lg" >Registrarse <i class="material-icons">add_box</i></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endsection


