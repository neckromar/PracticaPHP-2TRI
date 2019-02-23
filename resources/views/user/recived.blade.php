@extends('layouts.app2')
@section('title','Messages View')
@section('content')


<div class="pricing-plan-section">
    <div class="table-responsive">
          @if(count($mensajes))
        <table border="1" class="table">
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

                <td class="tamañotdimage"> <img src="{{ route('user.avatar',['filename'=>$mensaje->user->image_path]) }}" class="avatartd" /><a   class="alineartexto" href="{{route('profile',['id' => $mensaje ->id_autor ])}}" > {{$mensaje ->user_autor->name .' '. $mensaje ->user_autor->surname  }}</a></td>

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
                <td class="tamañotd">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" id="botonmodal" data-target="#myModal"  >
                        Borrar
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">

                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title">Estas seguro?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Desea eliminar este mensaje? Se elimara permanentemente
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href='{{route('message.delete',['id_mensaje' => $mensaje->id])}}' class="btn btn-danger">Borrar definitavamente</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </td>
            </tr>

            @endforeach
        </table>
        @else
        <div class='alert alert-danger'>
            {{ __('No se ha encontrado ningun mensaje :(') }}
        </div>
        @endif
    </div>
</div>

@endsection