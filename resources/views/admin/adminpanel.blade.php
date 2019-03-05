@extends('layouts.app2')
@section('title','Admin Panel')
@section('content')

<!-- Header -->
<header class="text-center py-5 mb-4">
    <div class="container">
        <h1 class="font-weight-light text-white">Panel de Administracion</h1>
    </div>
</header>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- LISTADO DE USUARIOS ACTIVOS -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card">

                <img src="{{asset('images/listadoactivo.png')}}" class="card-img-top" alt="..." style="margin-left: 25%;" > 

                <div class="card-body text-center">

                    <h5 class="card-title mb-0">Listado de usuarios activos</h5>
                    <br>
                    <div class="card-text text-black-50">

                        <a href="{{route('listarusuarios')}}" > <i class="material-icons">list</i> Listado </a>

                    </div>
                    <br>
                    <div class="card-text text-black-50">

                        <a href="{{ route('users.pdf',['activo' => 1]) }}"><i class="material-icons">
picture_as_pdf</i> Descargar usuarios activos en PDF </a>

                    </div>
                </div>
            </div>
        </div>


        <!-- LISTADO DE USUARIOS INACTIVOS-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{asset('images/listadoinactivo.png')}}" class="card-img-top" alt="..." style="margin-left: 25%;" > 

                <div class="card-body text-center">

                    <h5 class="card-title mb-0">Listado de usuarios inactivos</h5>
                    <br>
                    <div class="card-text text-black-50">
                        <a href="{{route('listarusuariosinactivos')}}" >
                           <i class="material-icons">list</i> Listado 
                        </a>

                    </div>
                    <br>
                    <div class="card-text text-black-50">
                        <a href="{{ route('users.pdf',['activo' => 0]) }}">
                           <i class="material-icons">picture_as_pdf</i> Descargar usuarios inactivos en PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- VER LOGS-->
        <br>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">


                <img src="{{asset('images/logs.png')}}" class="card-img-top" alt="..." style="margin-left: 25%;" > 
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">LOGS</h5>
                    <br>
                    <div class="card-text text-black-50">
                        <a href="{{route('user.logs')}}" >  <i class="material-icons">list</i>Ver Logs </a>

                    </div>
                    <br>
                    <div class="card-text text-black-50">
                        <a href="{{ route('users.pdf_logs') }}">  <i class="material-icons">picture_as_pdf</i> Descargar Logs </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Team Member 4 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{asset('images/eliminados.png')}}" class="card-img-top" alt="..." style="margin-left: 25%;" > 

                <div class="card-body text-center">
                    <h5 class="card-title mb-0">Ver usuarios eliminados</h5>
                    <br>
                    <div class="card-text text-black-50">

                        <a href="{{ route('ver_usuarios_eliminados') }}"> <i class="material-icons">list</i> Usuarios eliminados </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

@endsection
