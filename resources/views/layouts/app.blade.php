<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Pets - @yield('title')</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="56x56" href="{{asset('images/fav-icon/icon.png')}}">

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- Style -->
        <link href="{{asset('css/minificado/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/minificado/ingreso.min.css')}}" rel="stylesheet"/>

    </head>
    <body class="pagina-ingreso">
        <nav class="navbar navbar-transparent navbar-absolute" style="padding-top: 65px;">
            <div class="container">

                <div class="logo float-left"><a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt="Logo"></a></div>

            </div>
        </nav>

        @section('content')
        @show

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="{{route('index')}}">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Instituto
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    <p>Hecho por y para los alumnos !! &#10084;</p>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
<!--   JS   -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}"></script>
<script src="{{asset('js/material-kit.js')}}" type="text/javascript"></script>

</html>
