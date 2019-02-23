@extends('layouts.app2')

@section('content')
<div class="pricing-plan-section">
    <div class="row justify-content-center">

        <div class="col-md-6">
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

        </div>
        <a type="button" class="btn btn-simple btn-primary btn-lg" href=" {{route('user.send',['nick' => $user->nick])}}" >Enviar mensaje</a>
    </div>
</div>
@endsection
