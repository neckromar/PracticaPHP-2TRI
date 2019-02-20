<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <!-- Internet Explorer -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Contenido adaptable -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IES San Sebastian - @yield('title')</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="56x56" href="{{asset('images/fav-icon/icon.png')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <!-- Vendor Styles -->

        <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/Camera-master/css/camera.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/owl-carousel/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/WOW-master/css/libs/animate.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/fancybox/dist/jquery.fancybox.min.css')}}">


        <!-- Style -->
        <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('fonts/icon/font/font/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('fonts/icon/font/2/flaticon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    </head>

    <body>
        <div class="main-page-wrapper home-page-two">

            <div class="html-top-content">

                <!-- Menú -->
                <header class="theme-main-header">
                    <div class="container">
                        <div class="menu-wrapper clearfix">
                            <div class="logo float-left"><a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt="Logo"></a></div>

                            <ul class="button-group float-right">
                                <li>
                                    <a href="{{route('index')}}" >
                                        <i class="material-icons">home</i> Inicio
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.iessansebastian.com/" target="_blank">
                                        <i class="material-icons">feedback</i> Página Instituto
                                    </a>
                                </li>	
                                <li>
                                    <a href="{{route('contact')}}">
                                        <i class="material-icons">contact_mail</i> Contacto
                                    </a>
                                </li>	
                                
                                @guest
                                <li>
                                    <a href="{{route('login')}}" >
                                        <i class="material-icons">fingerprint</i> Ingresar
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}" >
                                        <i class="material-icons">person_add</i> Registrarse
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{route('home')}}" >
                                        <i class="material-icons">fingerprint</i> Volver a mi panel
                                    </a>
                                </li>
                                <li>
                                    <!--<a href="{{route('login')}}" > -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                        @csrf
                                    </form>

                                    </a>
                                </li>
                                @endguest

                            </ul>						
                        </div> 
                    </div> 
                </header> 
                <!-- /Menú  -->
                @section('content')
                @show

                @include('includes.footer')
                </body>
                </html>