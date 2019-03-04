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
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div>
                        <img src="http://localhost/PracticaPHP-2TRI/storage/app/users/{{ $pdf_ckeditor->curriculumde->image_path }}" style=' width: 100px;height: 100px; float: left; border-radius: 900px;overflow: hidden;margin-left:20px;margin-top:5px;' />
                        <br>

                        <div class="card-body">

                            {!! $pdf_ckeditor->contenido  !!}


                        </div>

                    </div>



                </div>

            </div>

        </div>


    </body>


</html>