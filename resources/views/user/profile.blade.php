@extends('layouts.app2')

@section('content')

<div class="pricing-plan-section">
    <div class="row justify-content-center" style="encentro">

        <div class="col-lg-10">
            <div class="profile-user">

                @if($user->image_path)
                <div class="container-avatar">
                    <img src="{{ route('user.avatar',['filename'=>$user->image_path]) }}" class="avatar" />
                </div>
                @endif

                <div class="user-info">
                    <h3>Nombre y apellidos:</h3>
                    <h1>{{ $user->name.' '.$user->surname .' '.$user->surname2}}</h1>
                    @if(\Auth::user()->poder == 'admin')
                    <p>Correo:  {{ $user->email}}</p>
                    <p>Telefono:  {{ $user->telefono}}</p>
                    <p>GitHub:  {{ $user->github}}</p>
                    <p>Pagina Web:  {{ $user->paginaweb}}</p>
                    @endif
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="clearfix"></div>

        </div>

    </div>
    <div class="encentroavatars">
        @if($user->activo != '0' && \Auth::user()->id != $user->id)
        <a type="button" class="btn btn-simple btn-primary btn-lg" href=" {{route('user.send',['email' => $user->email])}}" >Enviar mensaje</a>
        @endif

        @if(\Auth::user()->poder == 'admin')
        <a type="button" class="btn btn-simple btn-warning btn-lg" href=" {{route('config',['id' => $user->id])}}" >Modificar Perfil</a>
        
       
        @endif
        
         @if(\Auth::user()->poder == 'admin'  )
         <a type="button" class="btn btn-simple btn-warning btn-lg" href=" {{ route('users.pdf_ckedit',['id'=> $user->id]) }}" >Descargar curriculum</a>
        @endif

        @if(\Auth::user()->poder == 'admin' || \Auth::user()->id == $user->id)

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-simple btn-danger btn-lg" data-toggle="modal" id="botonmodal" data-target="#myModal"  >
            Borrar Usuario
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
                        Desea eliminar este usuario? Se elimara permanentemente
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                        <a type="button" class="btn  btn-danger" href=" {{route('user_delete',['id' => $user->id])}}" >Borrar definitavamente</a>
                    </div>

                </div>
            </div>
        </div>

        @endif

    </div>
</div>
@endsection
