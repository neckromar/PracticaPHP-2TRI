<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensajes;

class MensajesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function save(Request $request) {

        //validacion
        $validate = $this->validate($request, [
            'destinatario' => 'required|string|max:100',
            'asunto' => 'required|string|max:50',
            'contenido' => 'required|string|max:255',
        ]);

        //recoger datos

        $user = \Auth::user();

     
        $destinatario = $request->input('destinatario');
        $asunto = $request->input('asunto');
        $contenido = $request->input('contenido');

        //asignar los valores al objeto al guardar
        $messages = new Mensajes();
        
        $messages->id_autor = $user->id;
        
        $messages->asunto = $asunto;
        $messages->destinatario = $destinatario;
        $messages->contenido =$contenido;

        //guardar comentarios 
        $messages->save();

        //redireccion al finalizar
        return redirect()->route('user.messages',['id' => $user -> id])
                        ->with([
                            'message' => 'Has enviado el mensaje correctamente'
        ]);
    }

}
