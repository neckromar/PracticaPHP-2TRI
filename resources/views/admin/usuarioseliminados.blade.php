@extends('layouts.app2')
@section('title','Deleted Users')
@section('content')
<div class="pricing-plan-section">
    @include('includes.message')
    <table border="1" class="table">
        <tr class="bg-success text-white">
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha eliminacion</th>

        </tr>

        @foreach($users as $user)
        <tr>

            <td >{{$user->name}}</td> 
            <td>{{$user->surname}}</td> 
            <td>{{$user->surname2}}</td> 
            <td>{{$user->telefono}}</td> 
            <td>{{$user->email}}</td> 
            <td>{{$user->updated_at}}</td> 
        </tr>
        @endforeach

    </table>
    {{$users->links()}}
</div>
@endsection