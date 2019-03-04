@extends('layouts.app2')
@section('title','Messages View')
@section('content')

<div class="clearfix"></div>
<div class="pricing-plan-section">
    <div class="table-responsive">
        @if(count($mensajes))
        <table class="table">
            <thead>
                <tr class="active">
                    <th> Destinatario</th>
                    <th> Asunto</th>
                    <th> Contenido</th>
                    <th> Leido?</th>
                </tr>
            </thead>
            <tbody>
                @include('includes.message')
                @foreach($mensajes as $mensaje)

                @if($mensaje->leido == 0)

                <tr class="warning"> 
                    @else
                <tr class="success"> 
                    @endif   

                    <td class="tamañotdimage"> <img src="{{ route('user.avatar',['filename'=>$mensaje->user->image_path]) }}" class="avatartd" /><a   class="alineartexto" href="{{route('profile',['id' => $mensaje ->user->id ])}}" > {{$mensaje ->user->name .' '. $mensaje ->user->surname .' '. $mensaje ->user->surname2}}</a></td>
                    <td >{{ $mensaje->asunto }}</td>
                    <td>{{ $mensaje->contenido }}</td>
                    <td class="tamañotd">
                        @if($mensaje->leido == 0 )
                        <img src="{{ asset('images/noleido.png')}}" />
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




                        <!--                        <a href="{{route('message.delete',['id_mensaje' => $mensaje->id])}}" class="btn btn-danger">Borrar definitavamente</a>-->

                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
         {{$mensajes -> links()}}
        
        @else
        <div class='alert alert-danger'>
            {{ __('No se ha encontrado ningun mensaje :(') }}
        </div>
        @endif
    </div>
</div>


@endsection
