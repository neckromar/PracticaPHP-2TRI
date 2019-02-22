<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>IES San Sebastian - @yield('title')</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- Style -->
        <link href="{{asset('css/minificado/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/minificado/ingreso.min.css')}}" rel="stylesheet"/>


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

    <body class="pagina-ingreso">
        <div class="main-page-wrapper home-page-two">
            <div class="html-top-content">

                <!-- Menú -->
                <header class="theme-main-header contact">
                    <div class="container">
                        <div class="menu-wrapper clearfix ">

                            <ul class="button-group float-left">
                                <li>
                                    <a href="{{route('index')}}" >
                                        <i class="material-icons">home</i> Inicio
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">
                                        <i class="material-icons">contact_mail</i> Contacto
                                    </a>
                                </li>	
                                <li>
                                    <a href="{{route('home')}}" >
                                        <i class="material-icons">fingerprint</i> Volver a mi panel
                                    </a>
                                </li>
                            </ul>

                            <ul class="button-group float-right">
                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle"  data-toggle="dropdown"> <i class="material-icons">message</i> Mensajes</a>

                                        <ul class="dropdown-menu">

                                            <li><a href="{{route('user.send')}}">Enviar Mensajes</a></li>
                                            <li><a href="{{route('user.messages',['id' => Auth::user() ->id])}}">Ver mensajes enviados</a></li>
                                            <li><a href="{{route('user.recived',['id' => Auth::user() ->id])}}">Mensajes recibidos ({{count(Auth::user()->mensajes)}})</a></li>

                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a href="{{route('config')}}">
                                        <i class="material-icons"></i> Perfil
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

                            </ul>						
                        </div> 
                    </div> 
                </header> 
                <!-- /Menú  -->

                @yield('content')



            </div>


        </div>  
    </body>
    <!--   JS   -->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
     <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/material.min.js')}}"></script>
    <script src="{{asset('js/material-kit.js')}}" type="text/javascript"></script>

</html>


