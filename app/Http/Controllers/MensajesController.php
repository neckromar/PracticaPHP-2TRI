<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Logs;
use DateTime;
use App\Mensajes;
use Illuminate\Support\Facades\DB;

class MensajesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
   public function reenviarmensaje($id){
       
        $mensaje = Mensajes::find($id);
         $totusers = User::where('activo', 1)->get();
           return view('user.messageview', ['mensaje' => $mensaje,'totusers' => $totusers]);
        
       
   }

    public function save(Request $request) {

        //validacion
        $validate = $this->validate($request, [
            'destinatario' => 'required',
            'asunto' => 'required|string|max:50',
            'contenido' => 'required|string|max:255',
        ]);

        //recoger datos

        $user = \Auth::user();
        $timestamp = new DateTime();

        $destinatario = $request->input('destinatario');
        $asunto = $request->input('asunto');
        $contenido = $request->input('contenido');



        //asignar los valores al objeto al guardar
        $messages = new Mensajes();

        $messages->id_autor = $user->id;

        $messages->id_destinatario = $destinatario;
        $messages->asunto = $asunto;
        $messages->contenido = $contenido;

        //guardar comentarios 
        $messages->save();
        DB::table('logs')->insert(['tipo' => 'INSERT', 'tabla' => 'mensajes', 'id_hechopor' =>  \Auth::user()->id .'<- ID '.\Auth::user()->name .' '.\Auth::user()->surname .' '.\Auth::user()->surname2, 'id_cambiado' => $destinatario,'explicativo' => ' le han enviado un mensaje', 'created_at' => $timestamp, 'updated_at' => $timestamp]);

        //redireccion al finalizar
        return redirect()->route('user.messages', ['id' => $user->id])
                        ->with([
                            'message' => 'Has enviado el mensaje correctamente'
        ]);
    }

    public function delete($id) {
        //recoger los datos del usuario identificado 
        $user = \Auth::user();
        $timestamp = new DateTime();
        $delet = Mensajes::where('id', $id)->first();

        //Comprobar si soy el dueño del comentario o de la publicacion
        if ($user && ($delet->id_autor == $user->id) || $delet->id_destinatario == $user->id) {

            //conseguir los datos del objeto del comentario
            $delet->delete();
            DB::table('logs')->insert(['tipo' => 'DELETE', 'tabla' => 'mensajes', 'id_hechopor' => \Auth::user()->id, 'id_cambiado' => $delet->id, 'explicativo' => '<- Id del mensaje ,   '  . $delet->user->name . ' ' . $delet->user->surname . ' ' . $delet->user->surname2, 'created_at' => $timestamp, 'updated_at' => $timestamp]);

            return redirect()->route('home')
                            ->with([
                                'message' => 'Mensaje borrado!!'
            ]);
        } else {
            return redirect()->route('home')
                            ->with([
                                'message' => 'El mensaje no se ha borrado!!'
            ]);
        }
    }

    public function leido($id) {
        //recoger datos del usuario y la imagen
        $user = \Auth::user();


        $delet = Mensajes::where('id', $id)->first();



        if ($user && ($delet->id_destinatario == $user->id)) {

            //condicion para ver si existe el like
            $isset_leido = Mensajes::where('id_destinatario', $user->id)
                    ->where('id', $id)
                    ->first();
            if ($isset_leido->leido == 0) {
                $isset_leido->leido = 1;

                //guardar en bbdd
                $isset_leido->update();

                return response()->json([
                            'leido' => $isset_leido
                ]);
            } else {
                return redirect()->route('home')
                                ->with([
                                    'error' => 'El like ya esta marcado'
                ]);
            }
        } else {
            return redirect()->route('home')
                            ->with([
                                'error' => 'No puedes marcar como leido un mensaje que no es tuyo '
            ]);
        }
    }

}
