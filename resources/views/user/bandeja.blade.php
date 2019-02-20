@extends('layouts.app2')
@section('title','Messages')
@section('content')

<div class="col-md-6" style="margin-top:200px;">

    @foreach($mensajes as $mensaje)
    <div>
        
        <p>{{ $mensaje->asunto }}</p>
    </div>
    @endforeach


</div>

@endsection
