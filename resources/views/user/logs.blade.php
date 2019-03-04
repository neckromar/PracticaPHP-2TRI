@extends('layouts.app2')
@section('title','Logs View')
@section('content')

<div class="clearfix"></div>
<div class="pricing-plan-section">
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr class="active">
                    <th> Tipo</th>
                    <th> Tabla</th>
                    <th> Realizado por</th>
                    <th> Persona cambiada </th>
                    <th> Fecha de la operacion</th>
                </tr>
            </thead>
            <tbody>

                @foreach($logs as $log)
                @if($log->tipo =="UPDATE" || $log->tipo =="INSERT")
                <tr class="success"> 
                    @else
                <tr class="danger"> 
                    @endif

                    <td > {{ $log->tipo }}</td>
                    <td>{{ $log->tabla }}</td>
                    <td> <a   class="alineartexto" href="{{route('profile',['id' => $log->hechopor->id ])}}" > {{$log->hechopor->name .' '. $log->hechopor->surname .' '. $log->hechopor->surname2}}</a></td>


                    @if($log->tipo =="DELETE")
                    <td> {{$log->id_cambiado .' '. $log->explicativo }}</td>
                    @else
                    <td> <a   class="alineartexto" href="{{route('profile',['id' => $log->cambiado->id ])}}" > {{$log->cambiado->name .' '. $log->cambiado->surname .' '. $log->cambiado->surname2}}</a>{{$log->explicativo}}</td>
                    @endif
                    <td>{{ $log->created_at }} </td>
                </tr>

                @endforeach
            </tbody>
        </table>
             {{$logs -> links()}}
    </div>
</div>


@endsection
