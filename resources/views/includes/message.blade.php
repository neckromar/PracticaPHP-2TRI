
@if(session('message'))
    <div class='alert alert-success col-md-12'>
        {{  session('message') }}
    </div>
@endif
@if(session('error'))
    <div class='alert alert-danger  col-md-10 '>
        {{  session('error') }}
    </div>
@endif
            
            