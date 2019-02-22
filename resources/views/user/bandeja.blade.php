@extends('layouts.app2')
@section('title','Messages View')
@section('content')

<div class="comments" >
    <div class="col-md-6">
        <div class="table-responsive">
            <table border="1"  class="table alinearcentro">
                <tr class="active">
                    <th> Destinatario</th>
                    <th> Asunto</th>
                    <th> Contenido</th>
                    <th> Leido?</th>
                </tr>

                @include('includes.message')
                @foreach($mensajes as $mensaje)

                <tr class="active"> 
                    <td><a href="{{route('profile',['id' => $mensaje ->user->id ])}}" > {{ $mensaje->user->name }}</a></td>
                    <td>{{ $mensaje->asunto }}</td>
                    <td>{{ $mensaje->contenido }}</td>
                    <td class="tamañotd">
                        @if($mensaje->leido == 0 )
                        <img src="{{ asset('images/noleido.png')}}" />
                        @else
                        <img src="{{ asset('images/leido.png')}}" data-id="{{$mensaje->id}}" class="btn-dislike" />
                        @endif

                    </td>

                    <td class="tamañotd">
                        <a href="{{route('message.delete',['id_mensaje' => $mensaje->id])}}" class="btn btn-danger">Borrar definitavamente</a>

                    </td>
                </tr>


                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
