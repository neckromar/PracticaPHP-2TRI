var url="http://localhost/PracticaPHP-2TRI/public";

window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    //boton de likes

    function leido(){
        $('.btn-like').unbind('click').click(function () {
            console.log('leido');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/images/leido.png');
            
            $.ajax({
                url: url+'/messages/'+$(this).data('id'),
                 
                type:'GET',
                success: function(response){
                    if(response.leido)
                    {
                         console.log('Has leido el mensaje ');
                    }else{
                        console.log('Error');
                    }
                   
                }
                
            });
            
            
        });
        
    }

    leido();

  
});

