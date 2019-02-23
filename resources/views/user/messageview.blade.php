@extends('layouts.app2')
@section('title','Messages')
@section('content')

<div class="clearfix"></div>

<div class="pricing-plan-section" >

    <h2 class="centrarh2"> Send Message </h2>
    <hr>

    <form method="POST" action="{{route('messages.save')}}">
        @csrf

        <div class="form-group row">
            <label for="destinatario" class="col-md-4 col-form-label text-md-right">{{ __('Destinatario') }}</label>

            <div class="col-md-6">
                <select name="destinatario" >
                    @foreach($totusers as $user)
                    @if($user->id != Auth::user()->id)
                    <option value="{{ $user->id }}">{{ $user->name .' '. $user->surname }}</option>
                    @endif
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="asunto" class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>

            <div class="col-md-6">
                <input id="text" type="asunto" class="form-control{{ $errors->has('asunto') ? ' is-invalid' : '' }}" name="asunto"  required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('asunto') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="contenido" class="col-md-4 col-form-label text-md-right">{{ __('Contenido') }}</label>
            <p>

                <textarea style="height: 130px;" class="form-control{{$errors->has('contenido') ? 'is-invalid' : ''}} " name="contenido" required ></textarea>
                @if($errors->has('content'))
                <span  class="invalid-feedback" role='alert'>
                    <strong>{{ $errors->first('contenido')}} </strong>
                </span>
                @endif
            </p>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4 alinear">

                <button type="submit" class="btn btn-simple btn-primary btn-lg"> HERE TO SEND! <i class="material-icons">done</i></button> 

            </div>
        </div>


    </form>

    <hr>

</div>


@endsection