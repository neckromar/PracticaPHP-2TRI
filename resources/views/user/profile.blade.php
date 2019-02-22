@extends('layouts.app2')

@section('content')
<div class="comments">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-user">

                @if($user->image_path)
                <div class="container-avatar">
                    <img src="{{ route('user.avatar',['filename'=>$user->image_path]) }}" class="avatar" />
                </div>
                @endif

                <div class="user-info">
                    <h1>Nick: {{$user->nick}}</h1>
                    <h2>{{ $user->name.' '.$user->surname}}</h2>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="clearfix"></div>
           
            <a type="button" href=" {{route('user.send',['nick' => $user->nick])}}" >Enviar mensaje</a>
            
        </div>

    </div>
</div>
@endsection
