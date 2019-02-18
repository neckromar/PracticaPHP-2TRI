@extends('layouts.app')
@section('title','Ingresar')

@section('content')
<div class="wrapper">

    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('{{asset('images/usuarios/ingresar.jpg')}}'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card tarjeta-registro">
                            <form class="form" method="POST" action="{{route('login')}}">

                                @csrf

                                <div class="header header-primary text-center">
                                    <h4>Ingresar</h4>
                                </div>

                                <p class="text-divider">¡Bienvenido! &#10084;</p><br>
                                <div class="content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Correo electrónico..." value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>

                                        <input type="password" placeholder="Contraseña..." class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif

                                    </div><br>

                                </div>
                                
                               
                                <div class="footer text-center">
                                     <button type="submit" class="btn btn-simple btn-primary btn-lg">Ingresar <i class="material-icons">fingerprint</i></button> 
                                </div>
                             
                               
                                <div class="password"><a href="{{route('password.request')}}"><span class="label label-danger">¿Olvidaste la contraseña?</span></a></div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endsection
