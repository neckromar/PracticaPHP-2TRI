var url = "http://localhost/PracticaPHP-2TRI/public";

window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    //boton de likes

    function leido() {
        $('.btn-like').unbind('click').click(function () {
            console.log('leido');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url + '/images/leido.png');

            $.ajax({
                url: url + '/messages/' + $(this).data('id'),

                type: 'GET',
                success: function (response) {
                    if (response.leido)
                    {
                        console.log('Has leido el mensaje ');
                    } else {
                        console.log('Error');
                    }

                }

            });


        });

    }

    leido();

    //buscador activos
    $('#buscador').submit(function () {
        if ($('#buscador #search').val() == "")
        {
        } else {
            $(this).attr('action', url + '/activos/' + $('#buscador #search').val() + '/' + $('#buscador #select').val() + '/' + $('#buscador #order').val());
        }
    });


    //buscador inactivos
    $('#buscadorin').submit(function () {

        if ($('#buscadorin #searchin').val() == "")
        {
        } else {
            $(this).attr('action', url + '/inactivos/' + $('#buscadorin #searchin').val() + '/' + $('#buscadorin #selectin').val() + '/' + $('#buscadorin #orderin').val());
        }

    });


    $('#familiaprofesional').unbind('click').click(function () {
        $('#selectfamilia').show();
        $('#familiaprofesional').hide();
        
        
        //cerar el superior
        
        $('#familiaprofesionalsuperior').hide();
        $('#selectfamiliasuperior').hide();
        $('#familiaprofesionalsuperior').hide();
    });
    
    
    $('#familiaprofesionalsuperior').unbind('click').click(function () {
        $('#selectfamiliasuperior').show();
        $('#familiaprofesionalsuperior').hide();
        
        //cerrar el medio
        $('#familiaprofesional').hide();
         $('#selectfamilia').hide();
        $('#familiaprofesional').hide();
        
        
    });

   
 


});

