@extends('layouts.app2')
@section('title','Messages View')
@section('content')


<div class="pricing-plan-section">
    <div class="table-responsive">
        @if(count($mensajes))
        <table  class="table">
            <thead>
                <tr class="active">
                    <th> Autor</th>
                    <th> Asunto</th>
                    <th> Contenido</th>
                    <th> Readed?</th>
                </tr >
            </thead>
            <tbody>
                @foreach($mensajes as $mensaje)
                @if($mensaje->leido == 0)

                <tr class="warning"> 
                    @else
                <tr class="success"> 
                    @endif   

                    <td class="tamañotdimage"> <img src="{{ route('user.avatar',['filename'=>$mensaje->user_autor->image_path]) }}" class="avatartd" /><a   class="alineartexto" href="{{route('profile',['id' => $mensaje ->id_autor ])}}" > {{$mensaje ->user_autor->name .' '. $mensaje ->user_autor->surname  .' '. $mensaje ->user_autor->surname2}}</a></td>

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
                        <a type="button" class="btn btn-warning"  href='{{route("reenviar.mensaje",["id" =>$mensaje->id ])}}'  >
                            Reenviar mensaje
                        </a>
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
            </tbody>
        </table>
        @else
         {{$mensajes -> links()}}
        <div class='alert alert-danger'>
            {{ __('No se ha encontrado ningun mensaje :(') }}
        </div>
        @endif
    </div>
</div>

@endsection