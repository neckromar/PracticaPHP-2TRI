@extends('layouts.app2')
@section('title','Messages View')
@section('content')

<div class="comments" >
    <div class="col-md-6">
        <div class="table-responsive">
            <table border="1" class="table alinearcentro">
                <tr class="active">
                    <th> Autor</th>
                    <th> Asunto</th>
                    <th> Contenido</th>
                    <th> Leido?</th>
                </tr >

                @foreach($mensajes as $mensaje)
                @if($mensaje->leido == 0)

                <tr class="warning"> 
                    @else
                <tr class="info "> 
                    @endif   

                    <td><a href="{{route('profile',['id' => $mensaje ->id_autor ])}}" > {{$mensaje ->user_autor->name }}</a></td>

                    <td>{{ $mensaje->asunto }}</td>
                    <td>{{ $mensaje->contenido }}</td>

                    <td class="tamañotd">
                        <!-- comprobar si se dio like -->
                        <?php $user_leido = false; ?>

                        @if($mensaje->leido == 0 )
                        <?php $user_leido = true; ?>
                        @endif

                        @if($user_leido)
                        <img src="{{ asset('images/noleido.png')}}" data-id="{{$mensaje->id}}" class="btn-like" />
                        @else
                        <img src="{{ asset('images/leido.png')}}" data-id="{{$mensaje->id}}" class="btn-dislike" />
                        @endif
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection