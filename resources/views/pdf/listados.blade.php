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

        <table border="1" class="table">
            <tr class="bg-success text-white">
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Telefono</th>
                <th>Correo</th>

            </tr>

            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td> 
                <td>{{$user->surname}}</td> 
                 <td>{{$user->surname2}}</td> 
                <td>{{$user->telefono}}</td> 
                <td>{{$user->email}}</td> 
            </tr>
            @endforeach

        </table>



    </body>


</html>
