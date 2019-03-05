<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>

        <table class="table">
            <thead>
                <tr class="bg-active">
                    <th> Tipo</th>
                    <th> Tabla</th>
                    <th> Realizado | Enviado por</th>
                    <th> Persona cambiada | destino | explicacion</th>
                    <th> Fecha de la operacion</th>
                </tr>
            </thead>
            <tbody>

                @foreach($logs as $log)

                <tr> 

                    <td > {{ $log->tipo }}</td>
                    <td>{{ $log->tabla }}</td>
                    <td>  {{$log->id_hechopor  }}</td>


                    @if($log->tipo =="DELETE" )
                    <td> {{$log->id_cambiado .' '. $log->explicativo }}</td>
                    @else
                    <td> {{$log->id_cambiado .' '. $log->explicativo}}</td>

                    @endif

                    <td>{{ $log->created_at }} </td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </body>

</html>