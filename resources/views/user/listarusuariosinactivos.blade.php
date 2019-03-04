@extends('layouts.app2')

@section('content')

<div class="pricing-plan-section">
    <div class="container">
        @include('includes.message')
        <h1 class="formpersonal">Buscador</h1>
        <form method="GET" action="{{route('listarusuariosinactivos')}}" id="buscadorin" class="formpersonal">
            <div class="row">
                <label>Seleccionar campo:</label>  
                <select name="selectin" id="selectin">
                    <option value="name">Nombre</option>
                     <option value="surname">Primer Apellido</option>
                    <option value="surname2">Segundo Apellido</option>
                    <option value="telefono">Telefono</option>
                    <option value="email">Correo</option>
                </select>
                <br>
                 <label>Ordenar de forma:</label>  
                <select name="orderin" id="orderin">
                    <option value="asc">Ascendente</option>
                    <option value="desc">Descendente</option>
                </select>
                <div class="form-group col">
                    <input type="text" id="searchin" class="form-control" />
                </div>
                <div class="form-group col btn-search">
                    <input type="submit" value="Buscar" class="btn btn-success"/>
                </div>
            </div>
        </form>
        <br>
        <div class="row justify-content-center" style="padding-left: 25%; " >
            <div class="col-md-6">

                @foreach($users as $user)
                <!-- codigo tarjeta imagen -->
                @include('includes.perfiles',['user' => $user])

                @endforeach

                <!-- paginacion -->
                <div class="clearfix"></div>
                {{$users -> links()}}
            </div>

        </div>
  
    </div>
</div>
@endsection
