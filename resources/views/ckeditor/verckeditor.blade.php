@extends('layouts.app2')
@section('title','View Ckeditor')
@section('content')


<div class="container" style="margin-left: 25%;">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div>
                 <img src="{{ route('user.avatar',['filename'=>\Auth::user()->image_path]) }}" class="avatarck" />
                 <br>
                
                <div class="card-body">
                    {!! $fila ->contenido !!}
                    
                    
                    
                </div>
                
            </div>
            
                
            
        </div>
        
    </div>
    
</div>



@endsection