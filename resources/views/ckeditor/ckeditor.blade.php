@extends('layouts.app2')
@section('title','Send Ckeditor')
@section('content')


<div class="container" style="margin-left: 25%;">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div >
                
                <div class="card-header">Prueba CKEditor</div>
                
                <div class="card-body" style='width: 100%; '>
                   
                       @if($comprobar != null)
                         <form action="{{route("ck.update")}}" method="POST">
                        @else
                         <form action="{{route("ck.save")}}" method="POST">
                       
                        @endif
                        
                        @csrf
                            
                        @if($content != null)
                         <textarea name='contenido'>
                           {{ $content->contenido}}

                        </textarea>
                        @else
                        <textarea name='contenido'> </textarea>
                        @endif
                       
                        <br>
                        
                        <input type="submit" name='submit' value='Enviar'>
                        
                    </form>
                    
                    @section('js')
                    
                    <script>
                        CKEDITOR.replace('contenido');
                    
                    </script>
                    
                    @endsection
                    
                    
                </div>
                
            </div>
            
                
            
        </div>
        
    </div>
    
</div>



@endsection